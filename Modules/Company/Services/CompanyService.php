<?php

namespace Modules\Company\Services;

use Illuminate\Support\Facades\DB;
use Modules\Company\Entities\Company;
use Modules\Company\External\Repositories\Contract\CompanyRepositoryInterface;
use Modules\Media\Services\MediaService;

class CompanyService
{
    public function __construct(
        protected CompanyRepositoryInterface $companyRepository,
        protected MediaService $mediaService
    ) {}

    public function all(string $orderBy = null, array $limit = [], array $with = [], array $conditions = [])
    {
        return $this->companyRepository->all($orderBy, $limit, $with, $conditions);
    }

    public function create(array $data): Company
    {
        $image = $data['image'] ?? null;
        unset($data['image']);
        return DB::transaction(function () use ($data, $image) {
            $company = $this->companyRepository->create($data);
            if ($image) {
                $dir = $company->uploadDir();
                $this->mediaService->upload($company, $image, 'logo', $dir);
            }
            return $company;
        });
    }

    public function update(Company $company, array $data): Company
    {
        $image = $data['image'] ?? null;
        unset($data['image']);
        return DB::transaction(function () use ($company, $data, $image) {
            $company = $this->companyRepository->update($company, $data);
            if ($image) {
                $oldImage      = $company->medias()->first();
                $dir = $company->uploadDir();
                $this->mediaService->upload($company, $image, 'logo', $dir);
                if ($oldImage) {
                    $this->mediaService->delete($oldImage);
                }
            }
            return $company;
        });
    }

    public function getChart(Company $company)
    {
        $company->load(['charts' => function ($q) {
            $q->whereNull('parent_id');
        }, 'charts.children']);
        return $company->charts;
    }
}

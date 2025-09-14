<?php

namespace Modules\Company\Services;

use Illuminate\Support\Facades\DB;
use Modules\Company\Entities\Company;
use Modules\Company\External\Repositories\ChartRepository;
use Modules\Company\External\Repositories\Contract\ChartRepositoryInterface;
use Modules\Company\External\Repositories\Contract\CompanyRepositoryInterface;
use Modules\Media\Services\MediaService;
use Modules\User\Services\UserService;

class CompanyService
{
    public function __construct(
        protected CompanyRepositoryInterface $companyRepository,
        protected MediaService $mediaService,
        protected UserService $userService
    ) {
    }

    public function all(string $orderBy = null, array $limit = [], array $with = [], array $conditions = [])
    {
        return $this->companyRepository->all($orderBy, $limit, $with, $conditions);
    }
    public function find(int $id)
    {
        return $this->companyRepository->find($id);
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
        }, 'charts.children', 'charts.company_employees']);
        return $company->charts;
    }


    public function createEmployee(array $data)
    {
        return DB::transaction(function () use ($data) {
            $user = $this->userService->findByColumn('mobile', $data['mobile']);
            if (!$user) {
                $user = $this->userService->create($data);
            }
            $data['employee_id'] = $user->id;
            $company = $this->companyRepository->find($data['company_id']);
            $this->companyRepository->addEmployee($company, $data);
        });
    }


    public function deleteEmployee(int $companyEmployeeId)
    {
        $companyEmployee = $this->companyRepository->findCompanyEmployee($companyEmployeeId);
        $company = $this->companyRepository->find($companyEmployee->company_id);
        $this->companyRepository->deleteEmployee($company, $companyEmployee->employee_id, $companyEmployee->shift_id);
    }
}

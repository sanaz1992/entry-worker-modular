<?php

namespace Modules\Company\Services;

use Illuminate\Support\Facades\DB;
use Modules\Company\Entities\Chart;
use Modules\Company\External\Repositories\Contract\ChartRepositoryInterface;
use Modules\User\Services\UserService;

class ChartService
{
    public function __construct(
        protected ChartRepositoryInterface $chartRepository,
        protected UserService $userService
    ) {}

    public function find(int $id): Chart
    {
        return $this->chartRepository->find($id);
    }
    public function create(array $data): Chart
    {
        return DB::transaction(function () use ($data) {
            $chart = $this->chartRepository->create($data);
            return $chart;
        });
    }

    public function update(Chart $chart, array $data): Chart
    {
        return DB::transaction(function () use ($chart, $data) {
            $chart = $this->chartRepository->update($chart, $data);
            return $chart;
        });
    }

    public function addUserToChart(int $chartId, array $data)
    {
        $user = $this->userService->findByColumn('mobile', $data['mobile']);
        if (!$user) {
            $user = $this->userService->create($data);
        }
        $data['user_id'] = $user->id;
        $chart = $this->chartRepository->addUserToChart($chartId, $user->id);
        return $chart;
    }
}

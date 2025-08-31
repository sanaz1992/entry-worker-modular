<?php

namespace Modules\Company\Services;

use Illuminate\Support\Facades\DB;
use Modules\Company\Entities\Chart;
use Modules\Company\External\Repositories\Contract\ChartRepositoryInterface;

class ChartService
{
    public function __construct(
        protected ChartRepositoryInterface $chartRepository
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
}

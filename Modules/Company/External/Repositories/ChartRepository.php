<?php

namespace Modules\Company\External\Repositories;

use Modules\Company\Entities\Chart;
use Modules\Company\Entities\Company;
use Modules\Company\External\Repositories\Contract\ChartRepositoryInterface;
use Modules\Company\External\Repositories\Contract\CompanyRepositoryInterface;
use Modules\Core\External\Repositories\BaseRepository;
use Modules\Core\Helpers\SlugHelper;

class ChartRepository extends BaseRepository implements ChartRepositoryInterface
{
    public function __construct(Chart $model)
    {
        parent::__construct($model);
    }

    public function create(array $data): Chart
    {
        return Chart::create([
            'title'        => $data['title'],
            'company_id'        => $data['company_id'],
            'parent_id' => $data['parent_id'] ?? null,
            'refrence_id' => $data['refrence_id'] ?? null,
        ]);
    }

    public function update(Chart $chart, array $data): Chart
    {
        $chart->update([
            'title' => $data['title'],
        ]);
        return $chart;
    }
    public function addUserToChart(int $chartId, int $userId): Chart
    {
        $chart = $this->find($chartId);
        if ($chart->user_id) {
            $chart = $this->copyAndDeleteChart($chart);
        }
        $chart->user_id = $userId;
        $chart->save();
        return $chart;
    }
    public function copyAndDeleteChart(Chart $chart): Chart
    {
        $newChart = $this->create([
            'title' => $chart->title,
            'company_id' => $chart->company_id,
            'parent_id' => $chart->parent_id,
            'refrence_id' => $chart->id
        ]);

        $chart->children()->update(['parent_id' => $newChart->id]);
        $chart->delete();
        return $newChart;
    }

    public function deleteUserFromChart(int $chartId): Chart
    {
        $chart = $this->find($chartId);
        if ($chart->user_id) {
            $chart = $this->copyAndDeleteChart($chart);
            $chart->user_id = null;
            $chart->save();
        }
        return $chart;
    }
}

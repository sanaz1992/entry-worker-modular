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
        ]);
    }

    public function update(Chart $chart, array $data): Chart
    {
        $chart->update([
            'title' => $data['title'],
        ]);
        return $chart;
    }
}

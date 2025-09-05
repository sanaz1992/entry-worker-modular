<?php

namespace Modules\Company\External\Repositories\Contract;

use Modules\Company\Entities\Chart;
use Modules\Company\Entities\Company;
use Modules\Core\External\Repositories\Contract\BaseRepositoryInterface;

interface ChartRepositoryInterface extends BaseRepositoryInterface
{
    public function create(array $data): Chart;
    public function update(Chart $chart, array $data): Chart;
    public function addUserToChart(int $chartId, int $userId): Chart;
    public function deleteUserFromChart(int $chartId): Chart;
    public function copyAndDeleteChart(Chart $chart): Chart;
}

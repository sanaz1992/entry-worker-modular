<?php

namespace Modules\Company\External\Repositories\Contract;

use Modules\Company\Entities\Attendance;
use Modules\Company\Entities\Company;
use Modules\Company\Entities\CompanyEmployee;
use Modules\Core\External\Repositories\Contract\BaseRepositoryInterface;

interface AttendanceRepositoryInterface extends BaseRepositoryInterface
{
    public function create(array $data): Attendance;

}

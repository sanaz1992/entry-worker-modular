<?php

namespace Modules\Company\External\Repositories;

use Modules\Company\Entities\Attendance;
use Modules\Company\Entities\Company;
use Modules\Company\Entities\CompanyEmployee;
use Modules\Company\External\Repositories\Contract\AttendanceRepositoryInterface;
use Modules\Company\External\Repositories\Contract\CompanyRepositoryInterface;
use Modules\Core\External\Repositories\BaseRepository;
use Modules\Core\Helpers\ConvertDatesHelper;
use Modules\Core\Helpers\SlugHelper;

class AttendanceRepository extends BaseRepository implements AttendanceRepositoryInterface
{
    public function __construct(Company $model)
    {
        parent::__construct($model);
    }

    public function create(array $data): Attendance
    {
        return Attendance::create([
            'company_id' => $data['company_id'],
            'employee_id' => $data['employee_id'],
            'date' => $data['date'],
            'check_in' => $data['check_in'],
            'check_out' => $data['check_out'],
            'worked_minutes' => ConvertDatesHelper::getPeriodOfTimeToMinutes($data['check_in'], $data['check_out']),
            'description' => $data['description'] ?? null
        ]);
    }
}

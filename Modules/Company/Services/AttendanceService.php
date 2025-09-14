<?php

namespace Modules\Company\Services;

use Illuminate\Support\Facades\DB;
use InvalidArgumentException;
use Modules\Company\Entities\Attendance;
use Modules\Company\Entities\Company;
use Modules\Company\External\Repositories\Contract\AttendanceRepositoryInterface;
use Modules\Company\External\Repositories\Contract\CompanyRepositoryInterface;
use Modules\Media\Services\MediaService;
use Modules\User\Services\UserService;

class AttendanceService
{
    public function __construct(
        protected AttendanceRepositoryInterface $attendanceRepository
    ) {
    }

    public function all(string $orderBy = null, array $limit = [], array $with = [], array $conditions = [])
    {
        return $this->attendanceRepository->all($orderBy, $limit, $with, $conditions);
    }

    public function create(array $data): Attendance
    {
        if (!$this->checkAvailableCreateAttendance($data)) {
            throw new InvalidArgumentException(__('company::messages.this_attendance_has_contradiction'));
        }
        return DB::transaction(function () use ($data) {
            $attendance = $this->attendanceRepository->create($data);
            return $attendance;
        });
    }
    public function checkAvailableCreateAttendance(array $data)
    {
        $employee = resolve(UserService::class)->findByColumn('id', $data['employee_id']);
        $employee->load(['attendances' => function ($q) use ($data) {
            $q->where('date', $data['date'])
                ->where(function ($r) use ($data) {
                    $r->where([['check_in', '>', $data['check_in']], ['check_in', '>=', $data['check_out']]])
                        ->orWhere('check_out', '<', $data['check_in']);
                });
        }]);
        return $employee->attendances->count();
    }
}

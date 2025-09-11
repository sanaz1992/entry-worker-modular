<?php

namespace Modules\Company\External\Repositories;

use Modules\Company\Entities\ShiftDay;
use Modules\Company\External\Repositories\Contract\ShiftDayRepositoryInterface;
use Modules\Core\External\Repositories\BaseRepository;
use Modules\Core\Helpers\ConvertDatesHelper;

class ShiftDayRepository extends BaseRepository implements ShiftDayRepositoryInterface
{
    public function __construct(ShiftDay $model)
    {
        parent::__construct($model);
    }

    public function create(array $data): ShiftDay
    {
        return ShiftDay::create([
            'shift_id' => $data['shift_id'],
            'day_of_week' => ConvertDatesHelper::getDayOfWeek($data['date']),
            'date' => $data['date'],
            'start_time' => $data['start_time'],
            'end_time' => $data['end_time'],
            'break_start' => $data['break_start'] ?? null,
            'break_end' => $data['break_end'] ?? null,
        ]);
    }

    public function update(ShiftDay $shiftDay, array $data): ShiftDay
    {
        $shiftDay->update([
            'date' => $data['date'],
            'day_of_week' => ConvertDatesHelper::getDayOfWeek($data['date']),
            'start_time' => $data['start_time'],
            'end_time' => $data['end_time'],
            'break_time' => $data['break_time'] ?? null,
        ]);
        return $shiftDay;
    }

    public function findByDate(int $shiftId, string $date): ?ShiftDay
    {
        return ShiftDay::where([
            ['shift_id', $shiftId],
            ['date', $date]
        ])->first();
    }
}

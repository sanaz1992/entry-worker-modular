<?php

namespace Modules\Company\Services;

use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Support\Facades\DB;
use Modules\Company\Entities\ShiftDay;
use Modules\Company\External\Repositories\Contract\ShiftDayRepositoryInterface;

class ShiftDayService
{
    public function __construct(
        protected ShiftDayRepositoryInterface $shiftDayRepository,
    ) {}

    public function all(string $orderBy = null, array $limit = [], array $with = [], array $conditions = [])
    {
        return $this->shiftDayRepository->all($orderBy, $limit, $with, $conditions);
    }

    public function update(ShiftDay $shiftDay, array $data): ShiftDay
    {
        return DB::transaction(function () use ($shiftDay, $data) {
            $shiftDay = $this->shiftDayRepository->update($shiftDay, $data);
            return $shiftDay;
        });
    }

    public function createByPeriodDates(array $data)
    {
        $start = Carbon::parse($data['start_date']);
        $end = Carbon::parse($data['end_date']);
        $period = CarbonPeriod::create($start, $end);
        foreach ($period as $date) {
            $data['date'] = $date;
            if (!$this->shiftDayRepository->findByDate($data['shift_id'], $date)) {
                $this->shiftDayRepository->create($data);
            }
        }
    }

    /**
     * پیدا کردن شیفت بر اساس تاریخ
     *
     * @param ShiftDay $shiftDay
     * @param string $date تاریخ به فرمت Y-m-d مثل "2025-09-13"
     * @return void
     */
    public function findByDate(int $shiftId, string $date)
    {
        return $this->shiftDayRepository->findByDate($shiftId, $date);
    }
}

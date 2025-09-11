<?php

namespace Modules\Company\Services;

use Illuminate\Support\Facades\DB;
use Modules\Company\Entities\Shift;
use Modules\Company\External\Repositories\Contract\ShiftRepositoryInterface;

class ShiftService
{
    public function __construct(
        protected ShiftRepositoryInterface $shiftRepository,
        protected ShiftDayService $shiftDayService
    ) {}

    public function all(string $orderBy = null, array $limit = [], array $with = [], array $conditions = [])
    {
        return $this->shiftRepository->all($orderBy, $limit, $with, $conditions);
    }

    public function create(array $data)
    {
        return DB::transaction(function () use ($data) {
            $shift = $this->shiftRepository->create($data);
            $data['shift_id'] = $shift->id;
            $this->shiftDayService->createByPeriodDates($data);
        });
    }

    public function update(Shift $shift, array $data): Shift
    {
        return DB::transaction(function () use ($shift, $data) {
            $shift = $this->shiftRepository->update($shift, $data);
            return $shift;
        });
    }
}

<?php

namespace Modules\Company\External\Repositories\Contract;

use Modules\Company\Entities\ShiftDay;
use Modules\Core\External\Repositories\Contract\BaseRepositoryInterface;

interface ShiftDayRepositoryInterface extends BaseRepositoryInterface
{
    public function create(array $data): ShiftDay;
    public function update(ShiftDay $shiftDay, array $data): ShiftDay;
    public function findByDate(int $shiftId, string $date): ?ShiftDay;
}

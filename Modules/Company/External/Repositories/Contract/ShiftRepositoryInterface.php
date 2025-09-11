<?php

namespace Modules\Company\External\Repositories\Contract;

use Modules\Company\Entities\Shift;
use Modules\Core\External\Repositories\Contract\BaseRepositoryInterface;

interface ShiftRepositoryInterface extends BaseRepositoryInterface
{
    public function create(array $data): Shift;
    public function update(Shift $shift, array $data): Shift;
}

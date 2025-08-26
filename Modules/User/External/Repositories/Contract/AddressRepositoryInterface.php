<?php

namespace Modules\User\External\Repositories\Contract;

use Modules\Core\External\Repositories\Contract\BaseRepositoryInterface;
use Modules\User\Entities\Address;
use Modules\User\Entities\User;

interface AddressRepositoryInterface extends BaseRepositoryInterface
{
    public function create( array $data): Address;
    public function update(Address $address, array $data): Address;
}

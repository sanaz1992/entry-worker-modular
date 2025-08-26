<?php

namespace Modules\ACL\External\Repositories\Contract;

use Modules\ACL\Entities\Role;
use Modules\Core\External\Repositories\Contract\BaseRepositoryInterface;

interface RoleRepositoryInterface extends BaseRepositoryInterface
{
    public function create(array $data): Role;
    public function update(Role $role, array $data);
}

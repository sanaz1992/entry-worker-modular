<?php

namespace Modules\User\External\Repositories\Contract;

use Modules\Core\External\Repositories\Contract\BaseRepositoryInterface;
use Modules\User\Entities\User;

interface UserRepositoryInterface extends BaseRepositoryInterface
{
    public function create(array $data): User;
    public function update(User $user, array $data): User;
}

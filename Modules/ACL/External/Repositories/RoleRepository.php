<?php

namespace Modules\ACL\External\Repositories;

use Illuminate\Support\Facades\Hash;
use Modules\ACL\Entities\Role;
use Modules\ACL\External\Repositories\Contract\RoleRepositoryInterface;
use Modules\Core\External\Repositories\BaseRepository;
use Modules\User\Entities\User;

class RoleRepository extends BaseRepository implements RoleRepositoryInterface
{
    public function __construct(Role $model)
    {
        parent::__construct($model);
    }

    public function create(array $data): Role
    {
        return Role::create([
            'name'       => str_replace(' ', '_', $data['name']),
            'title'      => $data['title'],
            'guard_name' => 'web',
        ]);
    }

    public function update(Role $role, array $data)
    {
        $role->update([
            'title' => $data['title'],
        ]);
    }
}

<?php

namespace Modules\User\External\Repositories;

use Illuminate\Support\Facades\Hash;
use Modules\Core\External\Repositories\BaseRepository;
use Modules\User\Entities\User;
use Modules\User\External\Repositories\Contract\UserRepositoryInterface;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    public function __construct(User $model)
    {
        parent::__construct($model);
    }

    public function create(array $data): User
    {
        return User::create([
            'name'     => $data['name'],
            'mobile'   => $data['mobile'],
            'password' => Hash::make($data['password']),
            'level'    => $data['level'],
        ]);
    }

    public function update(User $user, array $data): User
    {
        $user->name = $data['name'];
        if (isset($data['password']) && strlen($data['password'])) {
            $user->password = Hash::make($data['password']);
        }
        $user->save();
        return $user;
    }
}

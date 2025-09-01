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
            'fname'        => $data['fname'],
            'lname' => $data['lname'],
            'mobile' => $data['mobile'],
            'email'         => $data['email'] ?? null,
            'password' => Hash::make($data['password'] ?? '12345678'),
            'level'    => $data['level'] ?? 'user',
        ]);
    }

    public function update(User $user, array $data): User
    {
        $user->update([
            'fname' => $data['fname'],
            'lname'  => $data['lname'],
            'mobile'  => $data['mobile'],
            'email'  => $data['email'] ?? null,
        ]);
        return $user;
    }
}

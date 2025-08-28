<?php

namespace Modules\User\Services;

use Illuminate\Support\Facades\DB;
use Modules\Media\Services\MediaService;
use Modules\User\Entities\User;
use Modules\User\External\Repositories\Contract\AddressRepositoryInterface;
use Modules\User\External\Repositories\Contract\UserRepositoryInterface;

class UserService
{
    public function __construct(
        protected UserRepositoryInterface $userRepository,
        protected MediaService $mediaService,
        protected AddressRepositoryInterface $addressRepository
    ) {
    }

    public function all(string $orderBy = null, array $limit = [], array $with = [], array $conditions = [])
    {
        return $this->userRepository->all($orderBy, $limit, $with, $conditions);
    }

    public function create(array $data): User
    {
        $image = $data['image'] ?? null;
        unset($data['image']);
        return DB::transaction(function () use ($data, $image) {
            $user = $this->userRepository->create($data);
            $data['user_id'] = $user->id;
            if ($image) {
                $dir =  $user->uploadDir();
                $this->mediaService->upload($user, $image, 'avatar', $dir);
            }
            return $user;
        });
    }

    public function update(User $user, array $data): User
    {
        $image = $data['image'] ?? null;
        unset($data['image']);
        return DB::transaction(function () use ($user, $data, $image) {
            $user = $this->userRepository->update($user, $data);
            if ($image) {
                $oldImage      = $user->medias()->first();
                $dir =  $user->uploadDir();
                $this->mediaService->upload($user, $image, 'avatar', $dir);
                if ($oldImage) {
                    $this->mediaService->delete($oldImage);
                }
            }
            return $user;
        });
    }

    public function delete($id)
    {
        $deleted = $this->userRepository->delete($id);

        if ($deleted) {
            session()->flash('success', 'رکورد با موفقیت حذف شد');
        } else {
            session()->flash('error', 'رکورد یافت نشد');
        }
    }
}

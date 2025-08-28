<?php

namespace Modules\User\Http\Livewire\User;

use Illuminate\Foundation\Auth\Access\Authorizable;
use Livewire\WithPagination;
use Modules\Dashboard\Http\Livewire\Admin\AdminDashboardBaseComponent;
use Modules\User\Enums\UserLevel;
use Modules\User\Services\UserService;

class UserList extends AdminDashboardBaseComponent
{
    public function render(UserService $userService)
    {
        $users = $userService->all();
        return $this->renderView(
            'user::livewire.user.user-list',
            compact('users')
        )->layoutData([
            'title' => __('user::attributes.users_list')
        ]);
    }
}

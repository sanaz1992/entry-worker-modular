<?php

namespace Modules\User\Http\Livewire\Admin;

use Illuminate\Foundation\Auth\Access\Authorizable;
use Livewire\WithPagination;
use Modules\Dashboard\Http\Livewire\Admin\AdminDashboardBaseComponent;
use Modules\User\Enums\UserLevel;
use Modules\User\Services\UserService;

class AdminList extends AdminDashboardBaseComponent
{
    use WithPagination;
    use Authorizable;

    public $columns = [];
    public $rows = [];
    public $statusConfig = [];
    public function mount()
    {
        $this->authorize('admins_list');

        $this->columns = [
            ['key' => 'avatar', 'label' =>  __('user::attributes.avatar')],
            ['key' => 'name', 'label' =>  __('user::attributes.name')],
            ['key' => 'mobile', 'label' =>  __('user::attributes.mobile')],
            ['key' => 'actions', 'label' => ''],
        ];
    }
    public function render(UserService $userService)
    {
        $conditions = [
            'where' => ['level' => ['=', UserLevel::ADMIN->value]],
        ];
        $users = $userService->list(null, [10, true], [], $conditions);

        return $this->renderView('user::livewire.admin.admin-list', compact('users'));
    }
}

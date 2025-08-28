<?php

namespace Modules\User\Http\Livewire\User;

use Illuminate\Foundation\Auth\Access\Authorizable;
use Livewire\WithPagination;
use Modules\Dashboard\Http\Livewire\Admin\AdminDashboardBaseComponent;
use Modules\User\Enums\UserLevel;
use Modules\User\Services\UserService;

class UserList extends AdminDashboardBaseComponent
{
    use WithPagination;
    use Authorizable;

    public $columns = [];
    public $rows = [];
    public $statusConfig = [];
    public function mount()
    {
        $this->authorize('users_list');

        $this->columns = [
            ['key' => 'avatar', 'label' =>  __('user::attributes.avatar')],
            ['key' => 'name', 'label' =>  __('user::attributes.name')],
            ['key' => 'mobile', 'label' =>  __('user::attributes.mobile')],
            ['key' => 'city', 'label' =>  __('user::attributes.city')],
            ['key' => 'orders_count', 'label' =>  __('user::attributes.orders_count')],
            ['key' => 'orders_active', 'label' =>  __('user::attributes.orders_active')],
            ['key' => 'orders_total_price', 'label' =>  __('user::attributes.orders_total_price') . '(' . __('user::attributes.rial') . ')'],
            ['key' => 'last_activity', 'label' =>  __('user::attributes.last_activity')],
            ['key' => 'actions', 'label' => ''],
        ];
    }
    public function render(UserService $userService)
    {
        $conditions = [
            'where' => ['level' => ['=', UserLevel::USER->value]],
        ];
        $users = $userService->list(null, [10, true], [], $conditions);

        return $this->renderView('user::livewire.user.user-list', compact('users'));
    }
}

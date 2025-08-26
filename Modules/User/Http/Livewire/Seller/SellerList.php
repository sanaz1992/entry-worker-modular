<?php

namespace Modules\User\Http\Livewire\Seller;

use Illuminate\Foundation\Auth\Access\Authorizable;
use Livewire\WithPagination;
use Modules\Core\Http\Livewire\Admin\AdminBaseComponent;
use Modules\User\Entities\User;
use Modules\User\Enums\UserLevel;
use Modules\User\Services\UserService;

class SellerList extends AdminBaseComponent
{
    use WithPagination, Authorizable;

    public $columns = [];
    public $rows = [];
    public $statusConfig = [];
    protected $listeners = ['refreshList' => '$refresh'];

    public function mount()
    {
        $this->authorize('sellers_list');

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

    public function confirmDelete()
    {
        $this->dispatchBrowserEvent('show-delete-confirmation');
    }

    public function deleteItem(UserService $userService, $id)
    {
        $userService->delete($id);

        session()->flash('message', 'آیتم با موفقیت حذف شد.');
        $this->dispatch('refreshList');
    }

    public function render(UserService $userService)
    {
        $conditions = [
            'where' => ['level' => ['=', UserLevel::SELLER->value]],
        ];
        $users = $userService->list(null, [10, true], ['addresses.city'], $conditions);

        return $this->renderView('user::livewire.seller.seller-list', compact('users'));
    }
}

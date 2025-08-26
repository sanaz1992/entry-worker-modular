<?php

namespace Modules\User\Http\Livewire\Seller;

use Illuminate\Foundation\Auth\Access\Authorizable;
use Livewire\WithFileUploads;
use Modules\Core\Http\Livewire\Admin\AdminBaseComponent;
use Modules\User\Entities\City;
use Modules\User\Entities\Province;
use Modules\User\Entities\State;
use Modules\User\Enums\UserLevel;
use Modules\User\Rules\StoreUserRules;
use Modules\User\Services\UserService;

class SellerCreate extends AdminBaseComponent
{
    use WithFileUploads, Authorizable;
    public $message;
    public $form = [
        'name'     => '',
        'mobile'   => '',
        'password' => '',
        'level' => '',
        'image'    => null,
        'province_id' => null,
        'city_id' => null,
        'address' => '',
        'postal_code' => ''
    ];
    public $provinces;
    public $cities = [];

    public function mount()
    {
        $this->authorize('sellers_create');

        $this->provinces = Province::orderBy('name')->get();
    }
    public function provinceChanged()
    {
        $provinceId = $this->form['province_id'];
        $this->cities = City::where('province_id', $provinceId)->get();
        $this->form['city_id'] = null;
    }

    public function store(UserService $userService)
    {
        $this->validate(StoreUserRules::rules(), trans('user::validation'), trans('user::attributes'));
        $this->form['level'] = UserLevel::SELLER->value;
        $userService->create($this->form);
        $this->message = __('user::messages.user_created_successfully');
        $this->reset('form');
    }
    public function render()
    {
        return $this->renderView('user::livewire.seller.seller-create');
    }
}

<?php

namespace Modules\User\Http\Livewire\Seller;

use Illuminate\Foundation\Auth\Access\Authorizable;
use Livewire\WithFileUploads;
use Modules\Dashboard\Http\Livewire\Admin\AdminDashboardBaseComponent;
use Modules\User\Entities\City;
use Modules\User\Entities\Province;
use Modules\User\Entities\User;
use Modules\User\Enums\UserLevel;
use Modules\User\Rules\UpdateUserRules;
use Modules\User\Services\UserService;

class SellerEdit extends AdminDashboardBaseComponent
{
    use WithFileUploads;
    use Authorizable;
    public User $user;
    public $form = [
        'name'     => '',
        'mobile'   => '',
        'password' => '',
        'level'    => '',
        'image'    => null,
        'province_id' => null,
        'city_id' => null,
        'address' => '',
        'postal_code' => ''
    ];

    public $message;
    public $provinces;
    public $cities = [];
    public function mount(User $user)
    {
        $this->authorize('sellers_edit');
        if ($user->level != UserLevel::SELLER->value) {
            return redirect()->route('admin.sellers.index')->with('error', 'شما دسترسی لازم را ندارید.');
        }


        $this->user           = $user;
        $this->form['name']   = $user->name;
        $this->form['mobile'] = $user->mobile;
        $this->form['level']  = $user->level;

        $address =  $user->addresses()->first();
        $this->form['province_id'] = $address->city->province_id;
        $this->form['city_id'] = $address->city_id;
        $this->form['address'] = $address->address;
        $this->form['postal_code'] = $address->postal_code;

        $this->provinces = Province::orderBy('name')->get();
        $this->cities = City::where('province_id', $address->city->province_id)->orderBy('name')->get();
    }

    public function provinceChanged()
    {
        $provinceId = $this->form['province_id'];
        $this->cities = City::where('province_id', $provinceId)->get();
        $this->form['city_id'] = null;
    }

    public function update(UserService $userService)
    {
        $this->validate(UpdateUserRules::rules($this->user->id), trans('user::validation'), trans('user::attributes'));
        $userService->update($this->user, $this->form);
        $this->message = __('user::messages.user_updated_successfully');
    }
    public function render()
    {
        return $this->renderView('user::livewire.seller.seller-edit');
    }
}

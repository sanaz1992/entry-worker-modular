<?php

namespace Modules\User\Http\Livewire\Admin;

use Illuminate\Foundation\Auth\Access\Authorizable;
use Livewire\WithFileUploads;
use Modules\Dashboard\Http\Livewire\Admin\AdminDashboardBaseComponent;
use Modules\User\Entities\User;
use Modules\User\Rules\StoreUserRules;
use Modules\User\Rules\UpdateUserRules;
use Modules\User\Services\UserService;

class AdminEdit extends AdminDashboardBaseComponent
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
    ];

    // public $permissions;
    public $message;
    public function mount(User $user)
    {
        $this->authorize('admins_edit');

        $this->user           = $user;
        $this->form['name']   = $user->name;
        $this->form['mobile'] = $user->mobile;
        $this->form['level']  = $user->level;
    }

    public function update(UserService $userService)
    {
        $this->validate(UpdateUserRules::rules($this->user->id), trans('user::validation'), trans('user::attributes'));
        $userService->update($this->user, $this->form);
        $this->message = __('user::messages.user_updated_successfully');
    }
    public function render(UserService $userService)
    {
        return $this->renderView('user::livewire.admin.admin-edit');
    }
}

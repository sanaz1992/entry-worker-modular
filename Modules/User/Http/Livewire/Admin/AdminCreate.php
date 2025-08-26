<?php

namespace Modules\User\Http\Livewire\Admin;

use Illuminate\Foundation\Auth\Access\Authorizable;
use Livewire\WithFileUploads;
use Modules\Core\Http\Livewire\Admin\AdminBaseComponent;
use Modules\User\Rules\StoreUserRules;
use Modules\User\Services\UserService;

class AdminCreate extends AdminBaseComponent
{
    use WithFileUploads, Authorizable;
    public $message;
    public $form = [
        'name'     => '',
        'mobile'   => '',
        'password' => '',
        'level'    => '',
        'image'    => null,
    ];

    public function mount()
    {
        $this->authorize('admins_create');
    }

    public function store(UserService $userService)
    {
        $this->validate(StoreUserRules::rules(), trans('user::validation'), trans('user::attributes'));
        $userService->create($this->form);
        $this->message = __('user::messages.user_created_successfully');
        $this->reset('form');
    }
    public function render(UserService $userService)
    {
        $users = $userService->list(null, [10, true]);

        return $this->renderView('user::livewire.admin.admin-create', compact('users'));
    }
}

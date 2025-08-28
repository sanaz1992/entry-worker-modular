<?php

namespace Modules\User\Http\Livewire\User;

use Illuminate\Foundation\Auth\Access\Authorizable;
use Livewire\WithFileUploads;
use Modules\Dashboard\Http\Livewire\Admin\AdminDashboardBaseComponent;
use Modules\User\Rules\StoreUserRules;
use Modules\User\Services\UserService;

class UserCreate extends AdminDashboardBaseComponent
{
    use WithFileUploads;

    public $form = [
        'fname' => '',
        'lname' => '',
        'email' => '',
        'mobile' => '',
        'image' => null,
    ];
    public $message;


    public function save(UserService $userService)
    {
        $this->validate(StoreUserRules::rules());

        $userService->create($this->form);
        $this->message = __('core::messages.create.success');
        $this->reset('form');
    }
    public function render()
    {
        return $this->renderView('user::livewire.user.user-create')
            ->layoutData([
                'title' => __('user::attributes.users_create')
            ]);
    }
}

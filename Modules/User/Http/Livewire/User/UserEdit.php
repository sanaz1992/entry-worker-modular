<?php

namespace Modules\User\Http\Livewire\User;

use Illuminate\Foundation\Auth\Access\Authorizable;
use Livewire\WithFileUploads;
use Modules\Dashboard\Http\Livewire\Admin\AdminDashboardBaseComponent;
use Modules\User\Entities\User;
use Modules\User\Rules\StoreUserRules;
use Modules\User\Rules\UpdateUserRules;
use Modules\User\Services\UserService;

class UserEdit extends AdminDashboardBaseComponent
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
    public $user;
    public function mount(UserService $userService, User $user)
    {
        // $this->authorize('categories_edit');
        $this->user      = $user;
        $this->form['fname'] = $user->fname;
        $this->form['lname'] = $user->lname;
        $this->form['email'] = $user->email;
        $this->form['email_verified_at'] = $user->email_verified_at;
        $this->form['mobile'] = $user->mobile;
        $this->form['mobile_verified_at'] = $user->mobile_verified_at;
    }
    public function update(UserService $userService)
    {
        $this->validate(UpdateUserRules::rules($this->user->id));
        $userService->update($this->user, $this->form);
        $this->message = __('core::messages.update.success');
    }
    public function render()
    {
        return $this->renderView('user::livewire.user.user-edit')
            ->layoutData([
                'title' => __('user::attributes.users_edit')
            ]);
    }
}

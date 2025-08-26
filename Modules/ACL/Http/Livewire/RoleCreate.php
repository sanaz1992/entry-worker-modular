<?php

namespace Modules\ACL\Http\Livewire;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Modules\ACL\Entities\Permission;
use Modules\ACL\Rules\StoreRoleRules;
use Modules\ACL\Services\RoleService;
use Modules\Core\Http\Livewire\Admin\AdminBaseComponent;

class RoleCreate extends AdminBaseComponent
{
    use AuthorizesRequests;
    public $permissions;
    public $message;
    public $form = [
        'title'               => '',
        'name'                => '',
        'selectedPermissions' => [],
    ];

    public function mount()
    {
        $this->authorize('roles_create');
        $this->permissions = Permission::get();
    }

    public function store(RoleService $roleService)
    {
        $this->validate(StoreRoleRules::rules());

        $roleService->create($this->form);

        $this->message = __('acl::messages.create.success');
        $this->reset('form');
    }

    public function render()
    {
        return $this->renderView('acl::livewire.role-create');
    }
}

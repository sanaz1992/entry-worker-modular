<?php

namespace Modules\ACL\Http\Livewire;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Modules\ACL\Entities\Permission;
use Modules\ACL\Entities\Role;
use Modules\ACL\Rules\StoreRoleRules;
use Modules\ACL\Rules\UpdateRoleRules;
use Modules\ACL\Services\RoleService;
use Modules\Dashboard\Http\Livewire\Admin\AdminDashboardBaseComponent;

class RoleEdit extends AdminDashboardBaseComponent
{
    use AuthorizesRequests;
    public Role $role;
    public $form = [
        'title'               => '',
        'selectedPermissions' => [],
    ];

    public $permissions;
    public $message;
    protected function mount(Role $role)
    {
        $this->authorize('roles_edit');
        $this->role                        = $role;
        $this->form['title']               = $role->title;
        $this->form['selectedPermissions'] = $role->permissions->pluck('name')->toArray();
        $this->permissions                 = Permission::get();
    }

    public function update(RoleService $roleService)
    {
        $this->validate(UpdateRoleRules::rules());

        $roleService->update($this->role, $this->form);
        $this->message = __('acl::messages.edit.success');
    }
    public function render()
    {
        return $this->renderView('acl::livewire.role-edit');
    }
}

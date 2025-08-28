<?php

namespace Modules\ACL\Http\Livewire;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\WithPagination;
use Modules\ACL\Services\RoleService;
use Modules\Dashboard\Http\Livewire\Admin\AdminDashboardBaseComponent;

class RoleList extends AdminDashboardBaseComponent
{
    use AuthorizesRequests;
    use WithPagination;
    public function mount()
    {
        $this->authorize('roles_list');
    }
    public function render(RoleService $roleService)
    {
        $roles = $roleService->list(null, [10, true], ['permissions']);

        return $this->renderView('acl::livewire.role-list', compact('roles'));
    }
}

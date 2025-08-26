<?php

namespace Modules\ACL\Http\Livewire;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\WithPagination;
use Modules\ACL\Services\RoleService;
use Modules\Core\Http\Livewire\Admin\AdminBaseComponent;
use Modules\User\Services\UserService;

class RoleList extends AdminBaseComponent
{
    use AuthorizesRequests, WithPagination;
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

<?php

namespace Modules\Dashboard\Http\Livewire\Admin;

use Livewire\Component;

class AdminDashboardBaseComponent extends Component
{
    public $authUser;
    protected function renderView($view, $data = [])
    {
        return view($view, $data)->layout('dashboard::layouts.admin.app');
    }
}

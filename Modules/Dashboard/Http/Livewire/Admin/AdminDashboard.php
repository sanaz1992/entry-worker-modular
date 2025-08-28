<?php

namespace Modules\Dashboard\Http\Livewire\Admin;

use Livewire\Component;

class AdminDashboard extends AdminDashboardBaseComponent
{
    public function render()
    {
        return $this->renderView('dashboard::livewire.admin.admin-dashboard')
            ->layoutData([
                'title' => __('dashboard::attributes.dashboard')
            ]);
    }
}

<?php  

namespace Modules\Dashboard\Http\Livewire\Admin;

use Livewire\Component;
use Modules\Core\Http\Livewire\Admin\AdminBaseComponent;

class AdminDashboard extends AdminBaseComponent {

     public function render()
    {
        return $this->renderView('dashboard::livewire.admin.admin-dashboard');
    }

}
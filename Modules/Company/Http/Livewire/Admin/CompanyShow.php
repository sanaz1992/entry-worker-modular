<?php

namespace Modules\Company\Http\Livewire\Admin;

use Livewire\Component;
use Modules\Company\Entities\Company;
use Modules\Dashboard\Http\Livewire\Admin\AdminDashboardBaseComponent;

class CompanyShow extends AdminDashboardBaseComponent
{
    public $company;
    public function mount(Company $company)
    {
        // $this->authorize('categories_edit');
        $this->company      = $company;
    }
    public function render()
    {
        return $this->renderView('company::livewire.admin.company-show')
            ->layoutData([
                'title' => __('company::attributes.companies_show')
            ]);
    }
}

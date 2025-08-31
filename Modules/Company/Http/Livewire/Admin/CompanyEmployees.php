<?php

namespace Modules\Company\Http\Livewire\Admin;

use Livewire\WithFileUploads;
use Modules\Company\Entities\Company;
use Modules\Dashboard\Http\Livewire\Admin\AdminDashboardBaseComponent;

class CompanyEmployees extends AdminDashboardBaseComponent
{
    use WithFileUploads;
    public $employees;
    public $form = [
        'title' => '',
        'manager_id' => '',
        'image' => null,
    ];
    public $message;
    public $company;
    public function mount(Company $company)
    {
        // $this->authorize('categories_edit');
        $this->company      = $company;
        $company->load(['employees.charts' => function ($q) use ($company) {
            $q->where('charts.company_id', $company->id);
        }]);
        $this->employees = $company->employees;
    }

    public function render()
    {

        return $this->renderView('company::livewire.admin.employees.company-employee-list')
            ->layoutData([
                'title' => __('company::attributes.company_employees') . ' ' . $this->company->title
            ]);
    }
}

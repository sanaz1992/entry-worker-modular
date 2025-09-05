<?php

namespace Modules\Company\Http\Livewire\Admin;

use Livewire\WithFileUploads;
use Modules\Company\Entities\Company;
use Modules\Company\Rules\StoreCompanyEmployeeRules;
use Modules\Company\Services\CompanyService;
use Modules\Dashboard\Http\Livewire\Admin\AdminDashboardBaseComponent;
use Modules\User\Services\UserService;

class CompanyEmployees extends AdminDashboardBaseComponent
{
    use WithFileUploads;
    public $employees;
    public $company;
    public function mount(Company $company)
    {
        // $this->authorize('categories_edit');
        $this->company      = $company;
        $company->load(['employees' => function ($q) {
            $q->where('charts.deleted_at', null);
        }]);
        $this->employees = $company->employees->unique();
    }
    public function render()
    {
        return $this->renderView('company::livewire.admin.employees.company-employee-list')
            ->layoutData([
                'title' => __('company::attributes.company_employees') . ' ' . $this->company->title
            ]);
    }
}

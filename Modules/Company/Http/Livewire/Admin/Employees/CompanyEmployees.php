<?php

namespace Modules\Company\Http\Livewire\Admin\Employees;

use Livewire\WithFileUploads;
use Modules\Company\Entities\Company;
use Modules\Company\Rules\StoreCompanyEmployeeRules;
use Modules\Company\Services\CompanyService;
use Modules\Core\Traits\LivewireNotify;
use Modules\Dashboard\Http\Livewire\Admin\AdminDashboardBaseComponent;
use Modules\User\Services\UserService;

class CompanyEmployees extends AdminDashboardBaseComponent
{
    use WithFileUploads, LivewireNotify;
    public $companyEmployees;
    public $company;
    public function mount(Company $company)
    {
        // $this->authorize('categories_edit');
        $this->company      = $company;
        $this->getCompanyEmployees();
    }
    public function getCompanyEmployees()
    {
        $this->company->load(['company_employees.employee', 'company_employees.shift', 'company_employees.chart']);
        $this->companyEmployees = $this->company->company_employees;
    }
    protected $listeners = ['deleteEmployee'];
    public function deleteEmployee(int $id, CompanyService $companyService)
    {
        try {
            $companyService->deleteEmployee($id);
            $this->notify('success', __('core::messages.update.success'));
            $this->getCompanyEmployees();
        } catch (\Exception $e) {
            $this->notify('error', __('core::messages.update.error'));
        }
    }
    public function render()
    {
        return $this->renderView('company::livewire.admin.employees.company-employee-list')
            ->layoutData([
                'title' => __('company::attributes.company_employees') . ' ' . $this->company->title
            ]);
    }
}

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
    public $showNewUserModal = false;
    public $form = [
        'fname' => '',
        'lname' => '',
        'mobile' => '',
        'chart_id' => '',
    ];
    // public $fname;
    // public $lname;
    // public $chartId;
    public $message;
    public $company;
    public $charts;
    public function mount(Company $company)
    {
        // $this->authorize('categories_edit');
        $this->company      = $company;
        $company->load('employees', 'charts');
        $this->employees = $company->employees->unique();
        $this->charts = $company->charts;
    }
    protected $listeners = ['closeNewUserModal'];

    public function showCreateUserModal()
    {
        $this->showNewUserModal = true;
    }
    public function closeNewUserModal()
    {
        $this->showNewUserModal = false;
    }


   

   

    public function deleteEmployee($value, CompanyService $companyService)
    {
        $companyService->deleteEmployee($this->company, $value);
        $this->message = __('core::messages.delete.success');

        $this->company->load('employees');
        $this->employees = $this->company->employees->unique();
    }

    public function render()
    {

        return $this->renderView('company::livewire.admin.employees.company-employee-list')
            ->layoutData([
                'title' => __('company::attributes.company_employees') . ' ' . $this->company->title
            ]);
    }
}

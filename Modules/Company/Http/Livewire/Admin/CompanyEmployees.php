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
    public $foundMobile = false;
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
        $company->load(['employees.charts' => function ($q) use ($company) {
            $q->where('charts.company_id', $company->id);
        }], 'charts');
        $this->employees = $company->employees;
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


    public function updatedFormMobile($value, UserService $userService)
    {
        $this->validate([
            'form.mobile' => ['required', 'regex:/^09[0-9]{9}$/'],
        ]);
        $user = $userService->findByColumn('mobile', $value);
        if ($user) {
            $this->form['fname'] = $user->fname;
            $this->form['lname'] = $user->lname;
            $this->foundMobile = true;
        } else {
            $this->foundMobile = false;
            $this->form['fname'] = '';
            $this->form['lname'] = '';
        }
    }

    public function createNewUser(CompanyService $companyService)
    {
        $this->validate(StoreCompanyEmployeeRules::rules());
        $companyService->createEmployee($this->company, $this->form);
        $this->message = __('core::messages.update.success');

        $this->company->load(['employees.charts' => function ($q) {
            $q->where('charts.company_id', $this->company->id);
        }], 'charts');
        $this->employees = $this->company->employees;
        $this->reset('form');
    }

    public function render()
    {

        return $this->renderView('company::livewire.admin.employees.company-employee-list')
            ->layoutData([
                'title' => __('company::attributes.company_employees') . ' ' . $this->company->title
            ]);
    }
}

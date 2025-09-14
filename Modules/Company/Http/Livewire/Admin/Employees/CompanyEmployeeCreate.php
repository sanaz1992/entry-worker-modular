<?php

namespace Modules\Company\Http\Livewire\Admin\Employees;

use Livewire\Component;
use Livewire\WithFileUploads;
use Modules\Company\Entities\Company;
use Modules\Company\Rules\StoreCompanyEmployeeRules;
use Modules\Company\Rules\StoreCompanyRules;
use Modules\Company\Services\ChartService;
use Modules\Company\Services\CompanyService;
use Modules\Company\Services\ShiftService;
use Modules\Core\Traits\LivewireNotify;
use Modules\Dashboard\Http\Livewire\Admin\AdminDashboardBaseComponent;
use Modules\User\Services\UserService;

class CompanyEmployeeCreate extends AdminDashboardBaseComponent
{
    use LivewireNotify;
    public $users;
    public $shifts;
    public $charts;
    public $company;
    public $foundMobile = false;
    public $form = [
        'shift_id' => '',
        'chart_id' => '',
        'fname' => '',
        'lname' => '',
        'mobile' => '',
    ];
    public $message;
    public function mount(
        Company $company,
        UserService $userService
    ) {
        $this->users = $userService->all();
        $this->company = $company;
        $company->load('shifts', 'charts');
        $this->shifts = $company->shifts;
        $this->charts = $company->charts;
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
    public function save(CompanyService $companyService)
    {
        try {
            $this->validate(StoreCompanyEmployeeRules::rules());
            $this->form['company_id'] = $this->company->id;
            $companyService->createEmployee($this->form);
            $this->notify('success', __('core::messages.create.success'));
            $this->reset('form');
            $this->foundMobile = false;
        } catch (\Exception $e) {
            $this->notify('error', __('core::messages.create.error'));
        }
    }
    public function render()
    {
        return $this->renderView('company::livewire.admin.employees.company-employee-create')
            ->layoutData([
                'title' => __('company::attributes.create_employee')
            ]);
    }
}

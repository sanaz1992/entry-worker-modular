<?php

namespace Modules\Company\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithFileUploads;
use Modules\Company\Entities\Company;
use Modules\Company\Rules\StoreCompanyRules;
use Modules\Company\Services\CompanyService;
use Modules\Dashboard\Http\Livewire\Admin\AdminDashboardBaseComponent;
use Modules\User\Services\UserService;

class CompanyEdit extends AdminDashboardBaseComponent
{
    use WithFileUploads;
    public $users;
    public $form = [
        'title' => '',
        'manager_id' => '',
        'image' => null,
    ];
    public $message;
    public $company;
    public function mount(Company $company, UserService $userService)
    {
        // $this->authorize('categories_edit');
        $this->company      = $company;
        $this->form['title'] = $company->title;
        $this->form['manager_id'] = $company->manager_id;

        $this->users = $userService->all();
    }
    public function update(CompanyService $companyService)
    {
        $this->validate(StoreCompanyRules::rules());
        $companyService->update($this->company, $this->form);
        $this->message = __('core::messages.update.success');
    }
    public function render()
    {
        return $this->renderView('company::livewire.admin.company-edit')
            ->layoutData([
                'title' => __('company::attributes.companies_edit') . ' ' . $this->company->title
            ]);
    }
}

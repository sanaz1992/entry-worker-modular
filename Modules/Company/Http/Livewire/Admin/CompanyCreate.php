<?php

namespace Modules\Company\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithFileUploads;
use Modules\Company\Rules\StoreCompanyRules;
use Modules\Company\Services\CompanyService;
use Modules\Dashboard\Http\Livewire\Admin\AdminDashboardBaseComponent;
use Modules\User\Services\UserService;

class CompanyCreate extends AdminDashboardBaseComponent
{
    use WithFileUploads;
    public $users;
    public $form = [
        'title' => '',
        'manager_id' => '',
        'image' => null,
    ];
    public $message;
    public function mount(UserService $userService)
    {
        $this->users = $userService->all();
    }

    public function save(CompanyService $companyService)
    {
        $this->validate(StoreCompanyRules::rules());

        $companyService->create($this->form);
        $this->message = __('core::messages.create.success');
        $this->reset('form');
    }
    public function render()
    {
        return $this->renderView('company::livewire.admin.company-create')
            ->layoutData([
                'title' => __('company::attributes.companies_create')
            ]);
    }
}

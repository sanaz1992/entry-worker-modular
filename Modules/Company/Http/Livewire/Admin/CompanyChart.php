<?php

namespace Modules\Company\Http\Livewire\Admin;

use Modules\Company\Entities\Company;
use Modules\Company\Rules\StoreChartNodeRules;
use Modules\Company\Rules\StoreCompanyEmployeeRules;
use Modules\Company\Services\ChartService;
use Modules\Company\Services\CompanyService;
use Modules\Dashboard\Http\Livewire\Admin\AdminDashboardBaseComponent;
use Modules\User\Services\UserService;

class CompanyChart extends AdminDashboardBaseComponent
{
    public $showOptions  = false;
    public $showEditModal = false;
    public $showNewNodeModal = false;
    public $showEmployeeModal = false;
    public $message;
    public $company;
    public $charts;
    public $showOptionModal = false;
    public $selectedNodeId;
    public $selectedNodeTitle;
    public $form = [
        'title' => '',
        'fname' => '',
        'lname' => '',
        'mobile' => '',
        'chart_id' => '',
    ];
    public function mount(Company $company)
    {
        // $this->authorize('categories_edit');
        $this->company      = $company;
        $this->loadChart();
    }
    public function loadChart()
    {
        $this->charts = resolve(CompanyService::class)->getChart($this->company);
    }

    protected $listeners = ['openNodeOptionModal', 'closeNodeOptionModal', 'closeEmployeeModal'];
    public function openNodeOptionModal($id, ChartService $chartService)
    {
        $this->selectedNodeId = $id;
        if ($id == 0) {
            $this->selectedNodeTitle = $this->company->title;
        } else {
            $chart = $chartService->find($this->selectedNodeId);
            $this->selectedNodeTitle = $chart->title;
        }
        $this->showOptionModal = true;
    }
    public function closeNodeOptionModal()
    {
        $this->showOptionModal = false;
    }
    public function closeEditModal()
    {
        $this->showEditModal = false;
        $this->showOptionModal = true;
    }

    public function closeNewNodeModal()
    {
        $this->showNewNodeModal = false;
        $this->showOptionModal = true;
    }

    public function editNode()
    {
        $this->showEditModal = true;
        $this->form['title'] = $this->selectedNodeTitle;
    }

    public function addNode()
    {
        $this->showNewNodeModal = true;
        $this->form['title'] = '';
    }

    public function editEmployee()
    {
        $this->showEmployeeModal = true;
    }

    public function closeEmployeeModal()
    {
        $this->showEmployeeModal = false;
    }
    public $foundMobile = false;

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
    public function createNewUser(ChartService $chartService)
    {
        $this->validate(StoreCompanyEmployeeRules::rules());
        $chart =  $chartService->addUserToChart($this->selectedNodeId, $this->form);
        $this->message = __('core::messages.update.success');
        $this->selectedNodeId = $chart->id;
        $this->reset('form');
        $this->foundMobile = false;
        $this->loadChart();
        $this->showEmployeeModal = false;
    }


    public function updateChartNode(ChartService $chartService, CompanyService $companyService)
    {
        $this->validate(StoreChartNodeRules::rules());
        $chart = $chartService->find($this->selectedNodeId);
        $chartService->update($chart, $this->form);
        $this->message = __('core::messages.update.success');
        $this->loadChart();
        $this->selectedNodeTitle = $this->form['title'];
    }

    public function createNewNode(ChartService $chartService, CompanyService $companyService)
    {
        $this->validate(StoreChartNodeRules::rules());
        $this->form['company_id'] = $this->company->id;
        $this->form['parent_id'] = $this->selectedNodeId;
        $chartService->create($this->form);
        $this->message = __('core::messages.update.success');
        $this->loadChart();
        $this->closeNewNodeModal();
    }
    public function render()
    {
        return $this->renderView('company::livewire.admin.company-chart')
            ->layoutData([
                'title' => __('company::attributes.companies_chart') . ' ' . $this->company->title
            ]);
    }
}

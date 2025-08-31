<?php

namespace Modules\Company\Http\Livewire\Admin;

use Modules\Company\Entities\Company;
use Modules\Company\Rules\StoreChartNodeRules;
use Modules\Company\Services\ChartService;
use Modules\Company\Services\CompanyService;
use Modules\Dashboard\Http\Livewire\Admin\AdminDashboardBaseComponent;

class CompanyChart extends AdminDashboardBaseComponent
{
    public $showOptions  = false;
    public $showEditModal = false;
    public $showNewNodeModal = false;
    public $message;
    public $company;
    public $charts;
    public $showOptionModal = false;
    public $selectedNodeId;
    public $selectedNodeTitle;
    public function mount(Company $company, CompanyService $companyService)
    {
        // $this->authorize('categories_edit');
        $this->company      = $company;
        $this->charts = $companyService->getChart($company);
    }

    protected $listeners = ['openNodeOptionModal', 'closeNodeOptionModal'];
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

    public $form = [
        'title' => '',
    ];
    public function updateChartNode(ChartService $chartService, CompanyService $companyService)
    {
        $this->validate(StoreChartNodeRules::rules());
        $chart = $chartService->find($this->selectedNodeId);
        $chartService->update($chart, $this->form);
        $this->message = __('core::messages.update.success');
        $this->charts = $companyService->getChart($this->company);
        $this->selectedNodeTitle = $this->form['title'];
    }

    public function createNewNode(ChartService $chartService, CompanyService $companyService)
    {
        $this->validate(StoreChartNodeRules::rules());
        $this->form['company_id'] = $this->company->id;
        $this->form['parent_id'] = $this->selectedNodeId;
        $chartService->create($this->form);
        $this->message = __('core::messages.update.success');
        $this->charts = $companyService->getChart($this->company);
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

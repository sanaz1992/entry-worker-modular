<?php

namespace Modules\Company\Http\Livewire\Admin;

use Livewire\Component;
use Modules\Company\Services\CompanyService;
use Modules\Dashboard\Http\Livewire\Admin\AdminDashboardBaseComponent;

class CompanyList extends AdminDashboardBaseComponent
{
    public function render(CompanyService $companyService)
    {
        $companies = $companyService->all(null, [], ['manager']);

        return $this->renderView(
            'company::livewire.admin.company-list',
            compact('companies')
        )->layoutData([
            'title' => __('company::attributes.companies_list')
        ]);
    }
}

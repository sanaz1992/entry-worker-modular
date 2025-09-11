<?php

namespace Modules\Company\Http\Livewire\Admin\Shifts;

use Modules\Company\Entities\Company;
use Modules\Company\Services\ShiftService;
use Modules\Dashboard\Http\Livewire\Admin\AdminDashboardBaseComponent;

class ShiftList extends AdminDashboardBaseComponent
{
    public $company;
    public function mount(Company $company)
    {
        // $this->authorize('categories_edit');
        $this->company      = $company;
    }
    public function render(ShiftService $shiftService)
    {
        $conditions = [
            'where' => ['company_id' => ['=', $this->company->id]],
        ];
        $shifts = $shiftService->all(null, [], [], $conditions);

        return $this->renderView(
            'company::livewire.admin.shifts.shift-list',
            compact('shifts')
        )->layoutData([
            'title' => __('company::attributes.shifts')
        ]);
    }
}

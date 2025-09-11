<?php

namespace Modules\Company\Http\Livewire\Admin\Shifts;

use Modules\Company\Entities\Company;
use Modules\Company\Entities\Shift;
use Modules\Company\Services\ShiftDayService;
use Modules\Dashboard\Http\Livewire\Admin\AdminDashboardBaseComponent;

class ShiftDayList extends AdminDashboardBaseComponent
{
    public $company;
    public $shift;
    public function mount(Company $company, Shift $shift)
    {
        // $this->authorize('categories_edit');
        $this->company = $company;
        $this->shift = $shift;
    }
    public function render(ShiftDayService $shiftDayService)
    {
        $conditions = [
            'where' => [
                'shift_id' => ['=', $this->shift->id]
            ],
        ];
        $shiftDays = $shiftDayService->all('date:asc', [], [], $conditions);

        return $this->renderView(
            'company::livewire.admin.shifts.shift-days-list',
            compact('shiftDays')
        )->layoutData([
            'title' => __('company::attributes.shift_days')
        ]);
    }
}

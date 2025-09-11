<?php

namespace Modules\Company\Http\Livewire\Admin\Shifts;

use Carbon\Carbon;
use Livewire\WithPagination;
use Modules\Company\Entities\Company;
use Modules\Company\Entities\Shift;
use Modules\Company\Services\ShiftDayService;
use Modules\Dashboard\Http\Livewire\Admin\AdminDashboardBaseComponent;

class ShiftDayList extends AdminDashboardBaseComponent
{
    use WithPagination;
    public $company;
    public $shift;
    public $activeTab = 'future_days';
    protected $paginationTheme = 'bootstrap';

    public function mount(Company $company, Shift $shift)
    {
        // $this->authorize('categories_edit');
        $this->company = $company;
        $this->shift = $shift;
    }

    // override pageName dynamically
    public function getPageName()
    {
        return $this->activeTab === 'future_days' ? 'futurePage' : 'pastPage';
    }

    public function render(ShiftDayService $shiftDayService)
    {
        $now = Carbon::now()->format('Y-m-d');
        if ($this->activeTab == "future_days") {
            $conditions = [
                'where' => [
                    'shift_id' => ['=', $this->shift->id],
                    'date' => ['>=', $now]
                ],
            ];
        } else {
            $conditions = [
                'where' => [
                    'shift_id' => ['=', $this->shift->id],
                    'date' => ['<', $now]
                ],
            ];
        }
        $shiftDays = $shiftDayService->all('date:asc', [10, true], [], $conditions);

        return $this->renderView(
            'company::livewire.admin.shifts.shift-days-list',
            compact('shiftDays')
        )->layoutData([
            'title' => __('company::attributes.shift_days')
        ]);
    }
}

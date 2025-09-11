<?php

namespace Modules\Company\Http\Livewire\Admin\Shifts;

use Modules\Company\Entities\Company;
use Modules\Company\Entities\Shift;
use Modules\Company\Rules\StoreShiftDayRules;
use Modules\Company\Services\ShiftDayService;
use Modules\Core\Traits\LivewireNotify;
use Modules\Dashboard\Http\Livewire\Admin\AdminDashboardBaseComponent;
use Morilog\Jalali\Jalalian;

class ShiftDayCreate extends AdminDashboardBaseComponent
{
    use LivewireNotify;
    public $form = [
        'start_date' => '',
        'end_date' => '',
        'start_time' => '',
        'end_time' => '',
        'break_start' => '',
        'break_end' => '',
    ];
    public $company;
    public $shift;
    public function mount(Company $company, Shift $shift)
    {
        $this->company = $company;
        $this->shift = $shift;
    }

    public function save(ShiftDayService $shiftDayService)
    {
        $this->form['shift_id'] = $this->shift->id;
        $this->form['start_date'] = Jalalian::fromFormat('Y/m/d', $this->form['start_date'])->toCarbon()->format('Y-m-d');
        $this->form['end_date'] = Jalalian::fromFormat('Y/m/d', $this->form['end_date'])->toCarbon()->format('Y-m-d');
        try {
            $this->validate(StoreShiftDayRules::rules());
            $shiftDayService->createByPeriodDates($this->form);
            $this->notify('success', __('core::messages.create.success'));
            $this->reset('form');
        } catch (\Illuminate\Validation\ValidationException $e) {
            $this->notify('error', __('core::messages.create.error'));
        }
    }
    public function render()
    {
        return $this->renderView('company::livewire.admin.shifts.shift-day-create')
            ->layoutData([
                'title' => __('company::attributes.shift_day_create')
            ]);
    }
}

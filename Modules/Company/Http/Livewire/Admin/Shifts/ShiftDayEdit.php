<?php

namespace Modules\Company\Http\Livewire\Admin\Shifts;

use Modules\Company\Entities\Company;
use Modules\Company\Entities\Shift;
use Modules\Company\Entities\ShiftDay;
use Modules\Company\Rules\UpdateShiftDayRules;
use Modules\Company\Services\ShiftDayService;
use Modules\Core\Helpers\ConvertDatesHelper;
use Modules\Core\Traits\LivewireNotify;
use Modules\Dashboard\Http\Livewire\Admin\AdminDashboardBaseComponent;
use Morilog\Jalali\Jalalian;

class ShiftDayEdit extends AdminDashboardBaseComponent
{
    use LivewireNotify;
    public $form = [
        'this_date' => '',
        'start_time' => '',
        'end_time' => '',
        'break_start' => '',
        'break_end' => '',
    ];
    public $company;
    public $shift;
    public $shiftDay;
    public function mount(Company $company, Shift $shift, ShiftDay $day)
    {
        $this->company = $company;
        $this->shift = $shift;
        $this->shiftDay = $day;

        $this->form['this_date'] = ConvertDatesHelper::convertEnglishNumbersToPersian(verta($day->date)->format('Y/m/d'));
        $this->form['start_time'] = $day->start_time;
        $this->form['end_time'] = $day->end_time;
        $this->form['break_start'] = $day->break_start;
        $this->form['break_end'] = $day->break_end;
    }

    public function update(ShiftDayService $shiftDayService)
    {
        $this->form['date'] = Jalalian::fromFormat('Y/m/d', $this->form['this_date'])->toCarbon()->format('Y-m-d');
        try {
            $this->validate(UpdateShiftDayRules::rules());
            $otherShiftDay = $shiftDayService->findByDate($this->shift->id, $this->form['date']);
            if (isset($otherShiftDay) && $otherShiftDay->id != $this->shiftDay->id) {
                $this->notify('error', __('company::messages.has_another_shift_day'));
                return;
            }
            $shiftDayService->update($this->shiftDay, $this->form);
            $this->notify('success', __('core::messages.update.success'));
        } catch (\Illuminate\Validation\ValidationException $e) {
            $this->notify('error', __('core::messages.update.error'));
        }
    }
    public function render()
    {
        return $this->renderView('company::livewire.admin.shifts.shift-day-edit')
            ->layoutData([
                'title' => __('company::attributes.shifts_edit')
            ]);
    }
}

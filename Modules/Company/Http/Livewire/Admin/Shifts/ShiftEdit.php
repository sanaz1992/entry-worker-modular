<?php

namespace Modules\Company\Http\Livewire\Admin\Shifts;

use Modules\Company\Entities\Company;
use Modules\Company\Entities\Shift;
use Modules\Company\Rules\UpdateShiftRules;
use Modules\Company\Services\ShiftService;
use Modules\Core\Traits\LivewireNotify;
use Modules\Dashboard\Http\Livewire\Admin\AdminDashboardBaseComponent;

class ShiftEdit extends AdminDashboardBaseComponent
{
    use LivewireNotify;
    public $form = [
        'title' => '',
        'is_night' => false,
    ];
    public $company;
    public $shift;
    public function mount(Company $company, Shift $shift)
    {
        $this->company = $company;
        $this->shift = $shift;
        $this->form['title'] = $shift->title;
        $this->form['is_night'] = $shift->is_night;
    }

    public function update(ShiftService $shiftService)
    {
        try {
            $this->validate(UpdateShiftRules::rules());
            $shiftService->update($this->shift, $this->form);
            $this->notify('success', __('core::messages.update.success'));
        } catch (\Exception $e) {
            $this->notify('error', __('core::messages.update.error'));
        }
    }
    public function render()
    {
        return $this->renderView('company::livewire.admin.shifts.shift-edit')
            ->layoutData([
                'title' => __('company::attributes.shifts_edit')
            ]);
    }
}

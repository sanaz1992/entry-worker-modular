<?php

namespace Modules\Company\Http\Livewire\Admin\Shifts;

use Modules\Company\Entities\Company;
use Modules\Company\Rules\StoreShiftRules;
use Modules\Company\Services\ShiftService;
use Modules\Core\Traits\LivewireNotify;
use Modules\Dashboard\Http\Livewire\Admin\AdminDashboardBaseComponent;
use Modules\User\Services\UserService;
use Morilog\Jalali\Jalalian;

class ShiftCreate extends AdminDashboardBaseComponent
{
    use LivewireNotify;
    public $form = [
        'title' => '',
        'start_date' => '',
        'end_date' => '',
        'start_time' => '',
        'end_time' => '',
        'break_start' => '',
        'break_end' => '',
        'is_night' => false,
    ];
    public $company;
    public function mount(Company $company, UserService $userService)
    {
        $this->company = $company;
    }

    public function save(ShiftService $shiftService)
    {
        try {
            $this->form['company_id'] = $this->company->id;
            $this->form['start_date'] = Jalalian::fromFormat('Y/m/d', $this->form['start_date'])->toCarbon()->format('Y-m-d');
            $this->form['end_date'] = Jalalian::fromFormat('Y/m/d', $this->form['end_date'])->toCarbon()->format('Y-m-d');

            $this->validate(StoreShiftRules::rules());
            $shiftService->create($this->form);
            $this->notify('success', __('core::messages.create.success'));
            $this->reset('form');
        } catch (\Exception $e) {
            $this->notify('error', __('core::messages.create.error'));
        }
    }
    public function render()
    {
        return $this->renderView('company::livewire.admin.shifts.shift-create')
            ->layoutData([
                'title' => __('company::attributes.shifts_create')
            ]);
    }
}

<?php

namespace Modules\Company\Http\Livewire\Admin\Attendances;

use InvalidArgumentException;
use Modules\Company\Rules\StoreAttendanceRules;
use Modules\Company\Rules\StoreCompanyRules;
use Modules\Company\Services\AttendanceService;
use Modules\Company\Services\CompanyService;
use Modules\Core\Traits\LivewireNotify;
use Modules\Dashboard\Http\Livewire\Admin\AdminDashboardBaseComponent;
use Modules\User\Services\UserService;
use Morilog\Jalali\Jalalian;

class AttendanceCreate extends AdminDashboardBaseComponent
{
    use LivewireNotify;
    public $companies;
    public $companyEmployees = [];
    public $form = [
        'company_id' => '',
        'employee_id' => '',
        'date' => '',
        'check_in' => '',
        'check_out' => '',
        'description' => ''
    ];
    public $message;
    public function mount()
    {
        $this->companies = resolve(CompanyService::class)->all();
    }

    public function updatedFormCompanyId($value)
    {
        $company = resolve(CompanyService::class)->find($value);
        $company->load('company_employees.employee');
        $this->companyEmployees = $company->company_employees;
    }

    public function save(AttendanceService $attendanceService)
    {
        try {
            $this->form['date'] = Jalalian::fromFormat('Y/m/d', $this->form['date'])->toCarbon()->format('Y-m-d');
            $this->validate(StoreAttendanceRules::rules());
            $attendanceService->create($this->form);
            $this->notify('success', __('core::messages.create.success'));
            $this->reset('form');
        } catch (InvalidArgumentException $e) {
            dd('1', $e->getMessage());
            $this->notify('error', $e->getMessage());
        } catch (\Exception $e) {
            dd('2', $e->getMessage());
            $this->notify('error', __('core::messages.create.error'));
        }
    }
    public function render()
    {
        return $this->renderView('company::livewire.admin.attendances.attendance-create')
            ->layoutData([
                'title' => __('company::attributes.attendance_create')
            ]);
    }
}

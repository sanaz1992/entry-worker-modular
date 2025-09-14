<?php

use Illuminate\Support\Facades\Route;
use Modules\Company\Http\Livewire\Admin\Attendances\AttendanceCreate;
use Modules\Company\Http\Livewire\Admin\CompanyChart;
use Modules\Company\Http\Livewire\Admin\CompanyCreate;
use Modules\Company\Http\Livewire\Admin\CompanyEdit;
use Modules\Company\Http\Livewire\Admin\Employees\CompanyEmployees;
use Modules\Company\Http\Livewire\Admin\CompanyList;
use Modules\Company\Http\Livewire\Admin\Employees\CompanyEmployeeCreate;
use Modules\Company\Http\Livewire\Admin\Shifts\ShiftCreate;
use Modules\Company\Http\Livewire\Admin\Shifts\ShiftDayCreate;
use Modules\Company\Http\Livewire\Admin\Shifts\ShiftDayEdit;
use Modules\Company\Http\Livewire\Admin\Shifts\ShiftDayList;
use Modules\Company\Http\Livewire\Admin\Shifts\ShiftEdit;
use Modules\Company\Http\Livewire\Admin\Shifts\ShiftList;

Route::middleware(['auth', 'verified'])
    ->name('admin.')->prefix('/admin')
    ->group(function () {

        Route::get('/companies', CompanyList::class)->name('companies.index');
        Route::get('/companies/{company}/show', CompanyEdit::class)->name('companies.show');
        Route::get('/companies/create', CompanyCreate::class)->name('companies.create');
        Route::get('/companies/{company}/edit', CompanyEdit::class)->name('companies.edit');
        Route::get('/companies/{company}/chart', CompanyChart::class)->name('companies.chart');

        Route::get('/companies/{company}/employees', CompanyEmployees::class)->name('companies.employees.index');
        Route::get('/companies/{company}/employees/create', CompanyEmployeeCreate::class)->name('companies.employees.create');

        Route::get('/companies/{company}/shifts', ShiftList::class)->name('companies.shifts.index');
        Route::get('/companies/{company}/shifts/create', ShiftCreate::class)->name('companies.shifts.create');
        Route::get('/companies/{company}/shifts/{shift}/edit', ShiftEdit::class)->name('companies.shifts.edit');

        Route::get('/companies/{company}/shifts/{shift}/days', ShiftDayList::class)->name('companies.shifts.days.index');
        Route::get('/companies/{company}/shifts/{shift}/days/create', ShiftDayCreate::class)->name('companies.shifts.days.create');
        Route::get('/companies/{company}/shifts/{shift}/days/{day}/edit', ShiftDayEdit::class)->name('companies.shifts.days.edit');

        Route::get('/attendances/create', AttendanceCreate::class)->name('attendances.create');

    });

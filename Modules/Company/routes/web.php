<?php

use Illuminate\Support\Facades\Route;
use Modules\Company\Http\Livewire\Admin\CompanyChart;
use Modules\Company\Http\Livewire\Admin\CompanyCreate;
use Modules\Company\Http\Livewire\Admin\CompanyEdit;
use Modules\Company\Http\Livewire\Admin\CompanyList;

Route::middleware(['auth', 'verified'])
    ->name('admin.')->prefix('/admin')
    ->group(function () {

        Route::get('/companies', CompanyList::class)->name('companies.index');
        Route::get('/companies/{company}/show', CompanyEdit::class)->name('companies.show');
        Route::get('/companies/create', CompanyCreate::class)->name('companies.create');
        Route::get('/companies/{company}/edit', CompanyEdit::class)->name('companies.edit');
        Route::get('/companies/{company}/chart', CompanyChart::class)->name('companies.chart');
    });

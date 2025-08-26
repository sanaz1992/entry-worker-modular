<?php

use Illuminate\Support\Facades\Route;
use Modules\Dashboard\Http\Controllers\DashboardController;
use Modules\Dashboard\Http\Livewire\Admin\AdminDashboard;


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    ])->group(function () {
        Route::get('/dashboard', function () {
            return view('welcome');
        })->name('dashboard');
});

Route::prefix('admin')
    ->middleware(['auth'])
    ->name('admin.')
    ->prefix('/admin')
    ->group(function () {
        Route::get('/dashboard',AdminDashboard::class)->name('dashboard');
});



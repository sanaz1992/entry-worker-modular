<?php

use Illuminate\Support\Facades\Route;
use Modules\ACL\Http\Livewire\RoleCreate;
use Modules\ACL\Http\Livewire\RoleEdit;
use Modules\ACL\Http\Livewire\RoleList;
use Modules\ACL\Http\Livewire\UserRolesEdit;

Route::middleware(['auth', 'verified'])
    ->name('admin.')
    ->prefix('/admin')
    ->group(function () {

        Route::get('/roles', RoleList::class)->name('roles.index');
        Route::get('/roles/create', RoleCreate::class)->name('roles.create');
        Route::get('/roles/{role}/edit', RoleEdit::class)->name('roles.edit');

        Route::get('/users/{user}/roles', UserRolesEdit::class)->name('users.roles.edit');
    });

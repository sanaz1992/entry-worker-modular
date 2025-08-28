<?php

use Illuminate\Support\Facades\Route;
use Modules\User\Http\Livewire\User\UserCreate;
use Modules\User\Http\Livewire\User\UserEdit;
use Modules\User\Http\Livewire\User\UserList;

// Route::middleware(['auth', 'verified'])->group(function () {
// Route::resource('users', UserList::class)->names('user');
// });
Route::name('admin.')->prefix('/admin')->group(function () {


    Route::get('/users', UserList::class)->name('users.index');
    Route::get('/users/{user}/show', UserEdit::class)->name('users.show');
    Route::get('/users/create', UserCreate::class)->name('users.create');
    Route::get('/users/{user}/edit', UserEdit::class)->name('users.edit');
});

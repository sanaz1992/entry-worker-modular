<?php

use Illuminate\Support\Facades\Route;
use Modules\User\Http\Livewire\Admin\AdminCreate;
use Modules\User\Http\Livewire\Admin\AdminEdit;
use Modules\User\Http\Livewire\Admin\AdminList;
use Modules\User\Http\Livewire\Seller\SellerCreate;
use Modules\User\Http\Livewire\Seller\SellerEdit;
use Modules\User\Http\Livewire\Seller\SellerList;
use Modules\User\Http\Livewire\User\UserCreate;
use Modules\User\Http\Livewire\User\UserEdit;
use Modules\User\Http\Livewire\User\UserList;

// Route::middleware(['auth', 'verified'])->group(function () {
// Route::resource('users', UserList::class)->names('user');
// });
Route::name('admin.')->prefix('/admin')->group(function () {

    Route::get('/admins', AdminList::class)->name('admins.index');
    Route::get('/admins/{user}/show',  AdminEdit::class)->name('admins.show');
    Route::get('/admins/create',  AdminCreate::class)->name('admins.create');
    Route::get('/admins/{user}/edit', AdminEdit::class)->name('admins.edit');

    Route::get('/sellers', SellerList::class)->name('sellers.index');
    Route::get('/sellers/{user}/show',  SellerEdit::class)->name('sellers.show');
    Route::get('/sellers/create',  SellerCreate::class)->name('sellers.create');
    Route::get('/sellers/{user}/edit', SellerEdit::class)->name('sellers.edit');

    Route::get('/users', UserList::class)->name('users.index');
    Route::get('/users/{user}/show',  UserEdit::class)->name('users.show');
    Route::get('/users/create',  UserCreate::class)->name('users.create');
    Route::get('/users/{user}/edit', UserEdit::class)->name('users.edit');
});

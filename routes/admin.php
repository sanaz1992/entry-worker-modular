<?php


use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->name('admin.')->prefix('/admin')->group(function () {
    // Route::get('/dashboard', Dashboard::class)->name('dashboard');









});

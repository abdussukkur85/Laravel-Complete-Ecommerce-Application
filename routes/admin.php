<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminProfileController;


Route::prefix('admin')->name('admin.')->group(function () {

    Route::middleware('guest:admin')->group(function () {
        Route::view('/login', 'backend.auth.login')->name('login');
        Route::post('/login', [AdminAuthController::class, 'login']);
    });

    Route::middleware('admin')->group(function () {
        Route::view('/dashboard', 'backend.dashboard')->name('dashboard');
        Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout');
        Route::get('/profile', [AdminProfileController::class, 'show'])->name('show_profile');
        Route::get('/profile/edit', [AdminProfileController::class, 'edit'])->name('edit_profile');
        Route::post('/profile/update', [AdminProfileController::class, 'update'])->name('update_profile');
        Route::get('/profile/change-password', [AdminProfileController::class, 'changePassword'])->name('change_password');
        Route::post('/profile/change-password', [AdminProfileController::class, 'changePasswordUpdate'])->name('update_password');

        Route::resource('brand', BrandController::class)->except(['create', 'show']);
    });
});

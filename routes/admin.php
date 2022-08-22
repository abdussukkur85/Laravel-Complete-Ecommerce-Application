<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\SubSubcategoryController;
use App\Http\Controllers\Admin\TagController;

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
        Route::resource('category', CategoryController::class)->except(['create', 'show']);
        Route::resource('subcategory', SubCategoryController::class)->except(['create', 'show']);
        Route::resource('subsubcategory', SubSubcategoryController::class)->except(['create', 'show']);
        Route::get('/subcategory/ajax/{id}', [SubSubcategoryController::class, 'getSubcategoryAjax'])->name('subcategory.ajax');
        Route::get('/subsubcategory/ajax/{id}', [SubSubcategoryController::class, 'getSubSubcategoryAjax'])->name('subsubcategory.ajax');

        Route::resource('products', ProductController::class);
        Route::put('product/{product}/inactive', [ProductController::class, 'inActive'])->name('products.inactive');
        Route::put('product/{product}/active', [ProductController::class, 'active'])->name('products.active');
        Route::delete('product/{id}/gallery_image', [ProductController::class, 'deleteGalleryImage'])->name('products.delete_gallery_image');


        Route::resource('slider', SliderController::class)->except(['create', 'show']);
        Route::put('slider/{slider}/inactive', [SliderController::class, 'inActive'])->name('slider.inactive');
        Route::put('slider/{slider}/active', [SliderController::class, 'active'])->name('slider.active');

        Route::resource('tags', TagController::class);
    });
});

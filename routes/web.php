<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Frontend\ProductController;


Route::get('/', [IndexController::class, 'index'])->name('frontend.home');

// Frontend Product Controller
Route::name('frontend.')->group(function () {
    Route::get('product/{product:slug}', [ProductController::class, 'details'])->name('product_details');
    Route::get('product/tag/{tag:slug}', [ProductController::class, 'tagWiseProduct'])->name('tag_wise_product');
    Route::get('product/sub-category/{subcategory:slug}', [ProductController::class, 'subcategoryWiseProduct'])->name('subcategory_wise_product');
    Route::get('product/sub-sub-category/{sub_subcategory:slug}', [ProductController::class, 'subSubcategoryWiseProduct'])->name('sub_subcategory_wise_product');
    Route::get('product/view/modal/{id}', [ProductController::class, 'productModalAjax']);
});


Route::middleware(['auth'])->group(function () {

    Route::view('/dashboard', 'frontend.dashboard')->name('frontend.dashboard');
    Route::view('user/password', 'frontend.auth.update-password');
    Route::view('user/profile-information', 'frontend.auth.update-profile');
});

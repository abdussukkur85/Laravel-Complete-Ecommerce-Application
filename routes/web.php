<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Frontend\ProductController;


Route::get('/', [IndexController::class, 'index'])->name('frontend.home');

// Frontend Product Controller
Route::name('frontend.')->group(function () {
    Route::get('product/{product:slug}', [ProductController::class, 'details'])->name('product_details');
    Route::get('product/{tag}', function ($value) {
        return $value;
    })->name('tag_wise_product');
});


Route::middleware(['auth'])->group(function () {

    Route::view('/dashboard', 'frontend.dashboard')->name('frontend.dashboard');
    Route::view('user/password', 'frontend.auth.update-password');
    Route::view('user/profile-information', 'frontend.auth.update-profile');
});

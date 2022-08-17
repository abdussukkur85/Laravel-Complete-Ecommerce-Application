<?php

use App\Http\Controllers\Frontend\IndexController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/dashboard', function () {
//     return view('frontend.dashboard');
// });
Route::get('/', [IndexController::class, 'index'])->name('frontend.home');

Route::middleware(['auth'])->group(function () {

    Route::view('/dashboard', 'frontend.dashboard')->name('frontend.dashboard');
    Route::view('user/password', 'frontend.auth.update-password');
    Route::view('user/profile-information', 'frontend.auth.update-profile');
});

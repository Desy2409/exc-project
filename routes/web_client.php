<?php

use App\Http\Controllers\AuthControllers\Client\LoginController;
use App\Http\Controllers\AuthControllers\Client\RegisterController;
use App\Http\Controllers\AuthControllers\Client\ForgotPasswordController;
use App\Http\Controllers\AuthControllers\Client\ResetPasswordController;
use App\Http\Controllers\ClientControllers\DashboardController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web client Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web_client" middleware group. Now create something great!
|
*/

Auth::routes();

// Route::prefix('client-area')->group(['middleware'=>['auth', 'client']],function () {
Route::prefix('client-area')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('client.dashboard');
    // Route::get('/login', [LoginController::class, 'loadLogin'])->name('loadClientLogin');
    // Route::post('/login', [LoginController::class, 'login'])->name('clientLogin');
    // Route::post('/logout', [LoginController::class, 'logout'])->name('clientLogout');
    // Route::get('/register', [RegisterController::class, 'loadRegister'])->name('loadClientRegister');
    // Route::post('/register', [RegisterController::class, 'register'])->name('clientRegister');
    // Route::get('/forgot-password', [ForgotPasswordController::class, 'loadForgotPassword'])->name('loadClientForgotPassword');
    // Route::get('/reset-password', [ResetPasswordController::class, 'loadResetPassword'])->name('loadClientResetPassword');
});

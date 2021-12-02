<?php

use App\Http\Controllers\AdminControllers\AdminAboutUsController;
use App\Http\Controllers\AdminControllers\AdminController;
use App\Http\Controllers\AdminControllers\AdminFaqController;
use App\Http\Controllers\AdminControllers\AdminServiceController;
use App\Http\Controllers\AdminControllers\BasketMessageController;
use App\Http\Controllers\AdminControllers\DashboardController;
use App\Http\Controllers\AdminControllers\NewMessageController;
use App\Http\Controllers\AdminControllers\OldMessageController;
use App\Http\Controllers\AuthControllers\Admin\ForgotPasswordController;
use App\Http\Controllers\AuthControllers\Admin\LoginController;
use App\Http\Controllers\AuthControllers\Admin\RegisterController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web_admin" middleware group. Now create something great!
|
*/

Auth::routes();

// Route::prefix('admin-area')->group(['middleware'=>['auth', 'admin']],function () {
Route::prefix('admin-area')->group(function () {
    Route::get('/register', function () {
        return view('auth.register_admin');
    });

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    Route::get('/register-token', [AdminController::class, 'loadRegisterFromToken'])->name('admin.register.token');

    // Faq routes
    Route::get('/faq', [AdminFaqController::class, 'index'])->name('admin_faq.index');
    Route::post('/faq', [AdminFaqController::class, 'store'])->name('admin_faq.store');
    Route::patch('/faq/{id}/update', [AdminFaqController::class, 'update'])->name('admin_faq.update');
    Route::delete('/faq/{id}/destroy', [AdminFaqController::class, 'destroy'])->name('admin_faq.destroy');

    // Service routes
    Route::get('/service', [AdminServiceController::class, 'index'])->name('admin_service.index');
    Route::post('/service', [AdminServiceController::class, 'store'])->name('admin_service.store');
    Route::patch('/service/{id}/update', [AdminServiceController::class, 'update'])->name('admin_service.update');
    Route::delete('/service/{id}/destroy', [AdminServiceController::class, 'destroy'])->name('admin_service.destroy');

    // About routes
    Route::get('/about-us', [AdminAboutUsController::class, 'index'])->name('admin_about.index');
    Route::post('/about-us', [AdminAboutUsController::class, 'store'])->name('admin_about.store');
    Route::patch('/about-us/{id}/update', [AdminAboutUsController::class, 'update'])->name('admin_about.update');
    Route::delete('/about-us/{id}/destroy', [AdminAboutUsController::class, 'destroy'])->name('admin_about.destroy');

    // >>>>>>>>>>> Contact routes <<<<<<<<<<<<<<<
    // New messages routes
    Route::get('/new-messages', [NewMessageController::class, 'index'])->name('new_message.index');
    Route::patch('/new-messages/{id}/read', [NewMessageController::class, 'read'])->name('new_message.read');
    // Old messages routes
    Route::get('/old-messages', [OldMessageController::class, 'index'])->name('old_message.index');
    // Basket messages routes
    Route::get('/basket', [BasketMessageController::class, 'index'])->name('basket.index');
});

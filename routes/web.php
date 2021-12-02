<?php

use App\Http\Controllers\AuthControllers\ForgotPasswordController;
use App\Http\Controllers\AuthControllers\LoginController;
use App\Http\Controllers\AuthControllers\RegisterController;
use App\Http\Controllers\AuthControllers\ResetPasswordController;
use App\Http\Controllers\PushController;
use App\Http\Controllers\ShowcaseControllers\AboutController;
use App\Http\Controllers\ShowcaseControllers\ContactController;
use App\Http\Controllers\ShowcaseControllers\FaqController;
use App\Http\Controllers\ShowcaseControllers\HomeController;
use App\Http\Controllers\ShowcaseControllers\ServiceController;
use Illuminate\Support\Facades\Auth;
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
Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/about-us', [AboutController::class, 'index'])->name('about_us.index');
Route::post('/about-us', [AboutController::class, 'store'])->name('about_us.store');
Route::get('/contact-us', [ContactController::class, 'index'])->name('contact_us.index');
Route::post('/contact-us', [ContactController::class, 'store'])->name('contact_us.store');
Route::get('/services', [ServiceController::class, 'index'])->name('services.index');
// Route::get('/services', [ServiceController::class, 'store'])->name('services.store');
Route::get('/faq', [FaqController::class, 'index'])->name('faq.index');
Route::post('/faq', [FaqController::class, 'store'])->name('faq.store');

//make a push notification.
Route::get('/push',[PushController::class,'push'])->name('push');

//store a push subscriber.
Route::post('/push',[PushController::class,'store']);

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::get('/login',[LoginController::class,'loadLogin'])->name('loadLogin');
// Route::post('/login',[LoginController::class,'login'])->name('login');
// Route::get('/register',[RegisterController::class,'loadRegister'])->name('loadRegister');
// Route::post('/register',[RegisterController::class,'register'])->name('register');
// Route::get('/forgot-password',[ForgotPasswordController::class,'loadForgotPassword'])->name('loadForgotPassword');
// Route::get('/reset-password',[ResetPasswordController::class,'loadResetPassword'])->name('loadResetPassword');

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

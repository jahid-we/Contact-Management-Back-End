<?php

use App\Http\Controllers\page\authPageController;
use App\Http\Controllers\page\homeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [homeController::class, 'HomePage']);

Route::get('/userLogin', [authPageController::class, 'LoginPage']);
Route::get('/userRegistration', [authPageController::class, 'RegistrationPage']);
Route::get('/sendOtp', [authPageController::class, 'SendOtpPage']);
Route::get('/verifyOtp', [authPageController::class, 'VerifyOTPPage']);


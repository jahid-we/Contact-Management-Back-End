<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\about\aboutController;
use App\Http\Controllers\page\profileController;
use App\Http\Controllers\page\authPageController;
use App\Http\Controllers\page\dashboardController;
use App\Http\Controllers\contact\contactController;
use App\Http\Controllers\page\passChangeController;
use App\Http\Controllers\page\contactPageController;
use App\Http\Middleware\tokenVerificationMiddleware;
use App\Http\Controllers\report\contactPdfcontroller;
use App\Http\Controllers\userRole\userRoleController;
use App\Http\Controllers\page\adminUserPageController;
use App\Http\Controllers\authentication\authController;
use App\Http\Controllers\profile\userProfileController;
use App\Http\Controllers\socialLink\socialLinkController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

/**** AUTHENTICATION ROUTES ****/
Route::post('/user-registration', [authController::class, 'register']); // User Registration
Route::post('/user-login', [authController::class, 'login']); // User Login
Route::post('/send-otp', [authController::class, 'sendOtp']); // Send OTP
Route::post('/verify-otp', [authController::class, 'verifyOtp']); // Verify OTP
Route::post('/reset-password', [authController::class, 'resetPassword'])->middleware([tokenVerificationMiddleware::class]); // Reset Password
Route::post('/changePassword', [authController::class, 'changePassword'])->middleware([tokenVerificationMiddleware::class]); // Change Password
Route::get('/user-logout', [authController::class, 'logout']); // User Logout

/**** CONTACT ROUTES ****/
Route::post('/create-contact', [contactController::class, 'createContact'])->middleware([tokenVerificationMiddleware::class]); // Create Contact
Route::post('/update-contact', [contactController::class, 'updateContact'])->middleware([tokenVerificationMiddleware::class]); // Update Contact
Route::post('/delete-contact', [contactController::class, 'deleteContact'])->middleware([tokenVerificationMiddleware::class]); // Delete Contact
Route::get('/contact-list', [contactController::class, 'contactList'])->middleware([tokenVerificationMiddleware::class]); // Get Contact List
Route::post('/contactById', [contactController::class, 'contactById'])->middleware([tokenVerificationMiddleware::class]); // Get Contact By Id
Route::get('/contact-count', [contactController::class, 'contactCount'])->middleware([tokenVerificationMiddleware::class]); // Get Contact Count
/**** PROFILE ROUTES ****/
Route::post('/create-profile', [userProfileController::class, 'createProfile'])->middleware([tokenVerificationMiddleware::class]); // Create Profile
Route::post('/update-profile', [userProfileController::class, 'updateProfile'])->middleware([tokenVerificationMiddleware::class]); // Update Profile
Route::get('/delete-profile', [userProfileController::class, 'deleteProfile'])->middleware([tokenVerificationMiddleware::class]); // Delete Profile
Route::get('/get-profile', [userProfileController::class, 'getProfile'])->middleware([tokenVerificationMiddleware::class]); // Get Profile

/**** SOCIAL LINK ROUTES ****/
Route::post('/create-social-link', [socialLinkController::class, 'createSocialLink'])->middleware([tokenVerificationMiddleware::class]); // Create Social Link
Route::post('/update-social-link', [socialLinkController::class, 'updateSocialLink'])->middleware([tokenVerificationMiddleware::class]); // Update Social Link
Route::get('/get-social-link', [socialLinkController::class, 'getSocialLink'])->middleware([tokenVerificationMiddleware::class]); // Get Social Link
Route::get('/delete-social-link', [socialLinkController::class, 'deleteSocialLink'])->middleware([tokenVerificationMiddleware::class]); // Delete Social Link

/**** About ROUTES ****/
Route::post('/create-about', [aboutController::class, 'createAbout'])->middleware([tokenVerificationMiddleware::class]); // Create About
Route::post('/update-about', [aboutController::class, 'updateAbout'])->middleware([tokenVerificationMiddleware::class]); // Update About
Route::get('/get-about', [aboutController::class, 'getAbout'])->middleware([tokenVerificationMiddleware::class]); // Get About
Route::get('/delete-about', [aboutController::class, 'deleteAbout'])->middleware([tokenVerificationMiddleware::class]); // Delete About

/**** User role Management ROUTES **** */

// User role Management
Route::post('/update-role', [userRoleController::class, 'updateRole'])->middleware([tokenVerificationMiddleware::class]);

// Get User
Route::get('/get-user', [userRoleController::class, 'getUser'])->middleware([tokenVerificationMiddleware::class]);

// Get Admin
Route::get('/get-admin', [userRoleController::class, 'getAdmin'])->middleware([tokenVerificationMiddleware::class]);

// Delete User
Route::post('/delete-user', [userRoleController::class, 'deleteUser'])->middleware([tokenVerificationMiddleware::class]);

// pages **************************************************************************************

// Dashboard Page
Route::get('/dashboard', [dashboardController::class, 'DashboardPage'])->middleware([tokenVerificationMiddleware::class]);

// Reset Password Page
Route::get('/resetPassword', [authPageController::class, 'ResetPasswordPage'])->middleware([tokenVerificationMiddleware::class]);

Route::get('/contact', [contactPageController::class, 'ContactPage'])->middleware([tokenVerificationMiddleware::class]);

Route::get('/all-o-user', [adminUserPageController::class, 'ContactPage'])->middleware([tokenVerificationMiddleware::class]);

// Profile Page Route
Route::get('/userProfile', [profileController::class, 'ProfilePage'])->middleware([tokenVerificationMiddleware::class]);


// Report Page Route
Route::get('/reportPage', [contactPdfcontroller::class, 'ReportPage'])->middleware([tokenVerificationMiddleware::class]);

Route::get("/getPdfContact", [contactPdfcontroller::class, 'getContactList'])->middleware([tokenVerificationMiddleware::class]);

// Get Contact By Id PDF
Route::get("/getPdfContactById/{contact_id}", [contactPdfcontroller::class, 'getContactListById'])->middleware([tokenVerificationMiddleware::class]);


// Password Change Route
Route::get('/passwordChange', [passChangeController::class, 'PasswordChangePage'])->middleware([tokenVerificationMiddleware::class]);

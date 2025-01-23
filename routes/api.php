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
// Handles user registration
Route::post('/user-registration', [authController::class, 'register']);

// Handles user login
Route::post('/user-login', [authController::class, 'login']);

// Sends OTP for verification
Route::post('/send-otp', [authController::class, 'sendOtp']);

// Verifies OTP for user authentication
Route::post('/verify-otp', [authController::class, 'verifyOtp']);

// Allows users to reset their password (requires token verification)
Route::post('/reset-password', [authController::class, 'resetPassword'])->middleware([tokenVerificationMiddleware::class]);

// Allows users to change their password (requires token verification)
Route::post('/changePassword', [authController::class, 'changePassword'])->middleware([tokenVerificationMiddleware::class]);

// Logs out the user
Route::get('/user-logout', [authController::class, 'logout']);

/**** CONTACT ROUTES ****/
// Creates a new contact (requires token verification)
Route::post('/create-contact', [contactController::class, 'createContact'])->middleware([tokenVerificationMiddleware::class]);

// Updates an existing contact (requires token verification)
Route::post('/update-contact', [contactController::class, 'updateContact'])->middleware([tokenVerificationMiddleware::class]);

// Deletes a contact (requires token verification)
Route::post('/delete-contact', [contactController::class, 'deleteContact'])->middleware([tokenVerificationMiddleware::class]);

// Retrieves a list of contacts (requires token verification)
Route::get('/contact-list', [contactController::class, 'contactList'])->middleware([tokenVerificationMiddleware::class]);

// Retrieves contact details by ID (requires token verification)
Route::post('/contactById', [contactController::class, 'contactById'])->middleware([tokenVerificationMiddleware::class]);

// Counts the total number of contacts (requires token verification)
Route::get('/contact-count', [contactController::class, 'contactCount'])->middleware([tokenVerificationMiddleware::class]);

/**** PROFILE ROUTES ****/
// Creates a new user profile (requires token verification)
Route::post('/create-profile', [userProfileController::class, 'createProfile'])->middleware([tokenVerificationMiddleware::class]);

// Updates an existing user profile (requires token verification)
Route::post('/update-profile', [userProfileController::class, 'updateProfile'])->middleware([tokenVerificationMiddleware::class]);

// Deletes a user profile (requires token verification)
Route::get('/delete-profile', [userProfileController::class, 'deleteProfile'])->middleware([tokenVerificationMiddleware::class]);

// Retrieves user profile information (requires token verification)
Route::get('/get-profile', [userProfileController::class, 'getProfile'])->middleware([tokenVerificationMiddleware::class]);

/**** SOCIAL LINK ROUTES ****/
// Creates a new social link (requires token verification)
Route::post('/create-social-link', [socialLinkController::class, 'createSocialLink'])->middleware([tokenVerificationMiddleware::class]);

// Updates an existing social link (requires token verification)
Route::post('/update-social-link', [socialLinkController::class, 'updateSocialLink'])->middleware([tokenVerificationMiddleware::class]);

// Retrieves social link information (requires token verification)
Route::get('/get-social-link', [socialLinkController::class, 'getSocialLink'])->middleware([tokenVerificationMiddleware::class]);

// Deletes a social link (requires token verification)
Route::get('/delete-social-link', [socialLinkController::class, 'deleteSocialLink'])->middleware([tokenVerificationMiddleware::class]);

/**** About ROUTES ****/
// Creates a new "About" section (requires token verification)
Route::post('/create-about', [aboutController::class, 'createAbout'])->middleware([tokenVerificationMiddleware::class]);

// Updates the "About" section (requires token verification)
Route::post('/update-about', [aboutController::class, 'updateAbout'])->middleware([tokenVerificationMiddleware::class]);

// Retrieves the "About" section (requires token verification)
Route::get('/get-about', [aboutController::class, 'getAbout'])->middleware([tokenVerificationMiddleware::class]);

// Deletes the "About" section (requires token verification)
Route::get('/delete-about', [aboutController::class, 'deleteAbout'])->middleware([tokenVerificationMiddleware::class]);

/**** User Role Management ROUTES ****/
// Updates user role (requires token verification)
Route::post('/update-role', [userRoleController::class, 'updateRole'])->middleware([tokenVerificationMiddleware::class]);

// Retrieves user information (requires token verification)
Route::get('/get-user', [userRoleController::class, 'getUser'])->middleware([tokenVerificationMiddleware::class]);

// Retrieves admin information (requires token verification)
Route::get('/get-admin', [userRoleController::class, 'getAdmin'])->middleware([tokenVerificationMiddleware::class]);

// Deletes a user (requires token verification)
Route::post('/delete-user', [userRoleController::class, 'deleteUser'])->middleware([tokenVerificationMiddleware::class]);

/**** Pages ROUTES ****/
// Displays the dashboard page (requires token verification)
Route::get('/dashboard', [dashboardController::class, 'DashboardPage'])->middleware([tokenVerificationMiddleware::class]);

// Displays the reset password page (requires token verification)
Route::get('/resetPassword', [authPageController::class, 'ResetPasswordPage'])->middleware([tokenVerificationMiddleware::class]);

// Displays the contact page (requires token verification)
Route::get('/contact', [contactPageController::class, 'ContactPage'])->middleware([tokenVerificationMiddleware::class]);

// Displays the admin user management page (requires token verification)
Route::get('/all-o-user', [adminUserPageController::class, 'ContactPage'])->middleware([tokenVerificationMiddleware::class]);

// Displays the user profile page (requires token verification)
Route::get('/userProfile', [profileController::class, 'ProfilePage'])->middleware([tokenVerificationMiddleware::class]);

// Displays the report page (requires token verification)
Route::get('/reportPage', [contactPdfcontroller::class, 'ReportPage'])->middleware([tokenVerificationMiddleware::class]);

// Retrieves the contact list in PDF format (requires token verification)
Route::get("/getPdfContact", [contactPdfcontroller::class, 'getContactList'])->middleware([tokenVerificationMiddleware::class]);

// Retrieves a contact by ID in PDF format (requires token verification)
Route::get("/getPdfContactById/{contact_id}", [contactPdfcontroller::class, 'getContactListById'])->middleware([tokenVerificationMiddleware::class]);

// Displays the password change page (requires token verification)
Route::get('/passwordChange', [passChangeController::class, 'PasswordChangePage'])->middleware([tokenVerificationMiddleware::class]);

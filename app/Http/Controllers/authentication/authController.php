<?php

namespace App\Http\Controllers\authentication;

use App\Http\Controllers\Controller;
use App\Services\AuthenticationService;
use Illuminate\Http\Request;

class authController extends Controller
{
    // Dependency Injection
    protected $authService;

    // Constructor for Dependency Injection
    public function __construct(AuthenticationService $authService)
    {
        $this->authService = $authService;
    }

    // Registration Part Start************************************
    public function register(Request $request)
    {
        return $this->authService->register($request);
    }
    // Registration Part End***************************************

    // Login Part Start******************************************
    public function login(Request $request)
    {
        return $this->authService->login($request);
    }
    // Login Part End********************************************

    // Logout Part Start******************************************
    public function logout(Request $request)
    {
        return $this->authService->logout($request);
    }
    // Logout Part End********************************************

    // Send OTP Part Start******************************************
    public function sendOtp(Request $request)
    {
        return $this->authService->sendOtp($request);
    }
    // Send OTP Part End********************************************

    // Verify OTP Part Start******************************************
    public function verifyOtp(Request $request)
    {
        return $this->authService->verifyOtp($request);
    }
    // Verify OTP Part End********************************************

    // Reset Password Part Start******************************************
    public function resetPassword(Request $request)
    {
        return $this->authService->resetPassword($request);
    }
    // Reset Password Part End********************************************

    // Change Password Part Start******************************************
    public function changePassword(Request $request)
    {
        return $this->authService->changePassword($request);
    }
    // Change Password Part End********************************************
}

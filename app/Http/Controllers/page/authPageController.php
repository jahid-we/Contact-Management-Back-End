<?php

namespace App\Http\Controllers\page;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class authPageController extends Controller
{
    public function LoginPage(): View
    {
        return view('pages.auth.login-page');
    }

    public function RegistrationPage(): View
    {
        return view('pages.auth.registration-page');
    }

    public function SendOtpPage(): View
    {
        return view('pages.auth.send-otp-page');
    }

    public function VerifyOTPPage(): View
    {
        return view('pages.auth.verify-otp-page');
    }

    public function ResetPasswordPage(): View
    {
        return view('pages.auth.reset-pass-page');
    }
}

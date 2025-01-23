<?php

namespace App\Services;

use App\Helper\JWTToken;
use App\Helper\ResponseHelper;
use App\Mail\OTPMail;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Mail;

class AuthenticationService
{
    // Registration Part Start************************************
    public function register($request)
    {

        try {
            $validatedData = $request->validate([
                'name' => 'required|string|max:50',
                'email' => 'required|email|unique:users,email,max:50',
                'password' => 'required|string|min:6|max:12',
            ]);

            // Use updateOrCreate
            User::create([
                'name' => $validatedData['name'],
                'email' => $validatedData['email'],
                'password' => $validatedData['password'],
            ]);

            return ResponseHelper::Out(true, 'User Registered Successfully', 200);

        } catch (Exception $e) {
            return ResponseHelper::Out(false, 'Something went wrong');
        }

    }
    // Registration Part End***************************************

    // Login Part Start******************************************
    public function login($request)
    {
        $email = $request->input('email');
        $password = $request->input('password');

        // Find user by email
        $user = User::where('email', $email)->select('id', 'email', 'role', 'password')->first();

        if ($user !== null) {
            // Compare plain text passwords
            if ($password === $user->password) {
                $token = JWTToken::createToken($email, $user->id, $user->role);

                return ResponseHelper::Out(true, $user->role, 200)
                    ->cookie('token', $token, time() + (60 * 24 * 30)); // Cookie expires in 30 days
            } else {
                return ResponseHelper::Out(false, 'Invalid Password', 401);
            }
        } else {
            return ResponseHelper::Out(false, 'User Not Found', 404);
        }
    }

    // Login Part End********************************************

    // Logout Part Start******************************************
    public function logout($request)
    {
        try {
            // Clear the token and redirect to login
            return redirect('/')
                ->cookie('token', '', time() - 3600)
                ->with('message', ResponseHelper::Out(true, 'Logout successful', 200));
        } catch (Exception $e) {
            // Use ResponseHelper for error message
            return ResponseHelper::Out(false, 'Something went wrong', 500);
        }
    }

    // Logout Part End********************************************

    // SEND OTP Part Start***************************************
    public function sendOtp($request)
    {
        try {
            $email = $request->input('email');
            $otp = rand(100000, 999999);
            $userExist = User::where('email', $email)->first();
            if ($userExist) {
                Mail::to($email)->send(new OTPMail($otp));

                User::where('email', $email)->update(['otp' => $otp]);

                return ResponseHelper::Out(true, 'OTP Sent Successfully. Please check your email,After 2 Minute OTP Will Expire.', 200);
            } else {
                return ResponseHelper::Out(false, 'User Not Found', 404);
            }
        } catch (Exception $e) {
            return ResponseHelper::Out(false, 'Something went wrong', 500);
        }

    }
    // SEND OTP Part End*****************************************

    // VERIFY OTP Part Start***************************************
    public function verifyOtp($request)
    {

        try {
            $email = $request->input('email');
            $otp = $request->input('otp');
            $count = User::where('email', $email)->where('otp', $otp)->first();
            if ($count) {
                $token = JWTToken::createToken($email, $count->id, $count->role);
                User::where('email', $email)->update(['otp' => '0']);

                return ResponseHelper::Out(true, 'OTP Verified Successfully', 200)->cookie('token', $token, 2);
            } else {
                return ResponseHelper::Out(false, 'Invalid OTP', 401);
            }
        } catch (Exception $e) {
            return ResponseHelper::Out(false, 'Something went wrong', 500);
        }

    }
    // VERIFY OTP Part End*****************************************

    // Password Reset Part Start***************************************
    public function resetPassword($request)
    {
        try {
            $email = $request->header('email');
            $password = $request->input('password');
            $user = User::where('email', $email)->first();
            if ($user) {
                User::where('email', $email)->update(['password' => $password]);

                return ResponseHelper::Out(true, 'Password Reset Successfully', 200);
            } else {
                return ResponseHelper::Out(false, 'User Not Found', 404);
            }
        } catch (Exception $e) {
            return ResponseHelper::Out(false, 'Something went wrong', 500);
        }
    }
    // Password Reset Part End*****************************************

    // Password Change Part Start***************************************
    public function changePassword($request)
    {
        try {
            $email = $request->header('email');
            $password = $request->input('password');
            $user = User::where('email', $email)->first();
            if ($user) {
                User::where('email', $email)->update(['password' => $password]);

                return ResponseHelper::Out(true, 'Password Change Successfully', 200);
            } else {
                return ResponseHelper::Out(false, 'User Not Found', 404);
            }
        } catch (Exception $e) {
            return ResponseHelper::Out(false, 'Something went wrong', 500);
        }
    }
    // Password Change Part End*****************************************
}

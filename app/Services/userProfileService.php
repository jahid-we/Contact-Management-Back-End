<?php

namespace App\Services;

use App\Helper\ResponseHelper;
use App\Models\User;
use App\Models\UserProfile;
use Exception;
use Illuminate\Support\Facades\File;

class userProfileService
{
    // Create Profile Start ************************************
    public function createProfile($request)
    {
        try {
            $userId = $request->header('userId');
            $name = $request->input('name');


            UserProfile::updateOrCreate(
                ['user_id' => $userId], // Check if the profile exists
                [
                    'name' => $name,
                    'phone' => $request->input('phone'),
                    'email' => $request->input('email'),
                    'present_address' => $request->input('present_address'),
                    'permanent_address' => $request->input('permanent_address'),
                    'about' => $request->input('about'),
                    'image' => $request->input('image'), // Update image if provided
                ]
            );

            // Update or create the user record with the provided name
            User::updateOrCreate(
                ['id' => $userId], // Check if the user exists
                [
                    'name' => $name,
                ]
            );

            return ResponseHelper::Out(true, 'Profile Created or Updated Successfully', 200);

        } catch (Exception $e) {
            // Handle unexpected errors
            return ResponseHelper::Out(false, 'Something went wrong', 500);
        }
    }
    // Create Profile End ***************************************

    // Update Profile Start ************************************
    public function updateProfile($request)
    {
        try {
            $userId = $request->header('userId');
            $name = $request->input('name');


                // Update user profile with the new image
                UserProfile::where('user_id', $userId)->update([
                    'name' => $name,
                    'phone' => $request->input('phone'),
                    'email' => $request->input('email'),
                    'present_address' => $request->input('present_address'),
                    'permanent_address' => $request->input('permanent_address'),
                    'about' => $request->input('about'),
                    'image' => $request->input('image'),
                ]);

            // Update the user's name in the users table
            User::updateOrCreate(
                ['id' => $userId],
                ['name' => $name]
            );

            return ResponseHelper::Out(true, 'Profile Updated Successfully', 200);
        } catch (Exception $e) {
            // Handle unexpected errors
            return ResponseHelper::Out(false, 'Something went wrong: ' . $e->getMessage(), 500);
        }
    }

    // Update Profile End ***************************************

    // Delete Profile Start ************************************
    public function deleteProfile($request)
    {
        try {
            $userId = $request->header('userId');

            // Ensure that a valid User ID is provided
            if (! $userId) {
                return ResponseHelper::Out(false, 'User ID is required', 400);
            }

            // Find the user profile for the given User ID
            $profile = UserProfile::where('user_id', $userId)->first();

            if (! $profile) {
                return ResponseHelper::Out(false, 'Profile Not Found', 404);
            }

            // Clear all profile fields except 'name' and 'user_id'
            UserProfile::where('user_id', $userId)->update([
                'phone' => '',
                'email' => '',
                'present_address' => '',
                'permanent_address' => '',
                'about' => '',
                'image' => '',
            ]);

            return ResponseHelper::Out(true, 'Profile Cleared Successfully', 200);

        } catch (Exception $e) {
            // Handle unexpected errors
            return ResponseHelper::Out(false, 'Something went wrong', 500);
        }
    }
    // Delete Profile End ***************************************

    // Get Profile Start ********************************************
    public function getProfile($request)
    {
        try {
            $userId = $request->header('userId');

            // Ensure that a valid User ID is provided
            if (! $userId) {
                return ResponseHelper::Out(false, 'User ID is required', 400);
            }

            // Retrieve the profile for the given User ID
            $profile = UserProfile::where('user_id', $userId)->first();

            if (! $profile) {
                return ResponseHelper::Out(false, 'Profile Not Found', 404);
            }

            return ResponseHelper::Out(true, $profile, 200);

        } catch (Exception $e) {
            // Handle unexpected errors
            return ResponseHelper::Out(false, 'Something went wrong', 500);
        }
    }

    // Get Profile End *********************************************

}

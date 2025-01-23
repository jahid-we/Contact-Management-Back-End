<?php

namespace App\Services;

use App\Helper\ResponseHelper;
use App\Models\About;
use Exception;

class aboutService
{
    // Create About Start ************************************
    public function createAbout($request)
    {
        try {
            $userId = $request->header('userId');
            $role = $request->header('role');
            if ($role != 'admin') {
                return ResponseHelper::Out(false, 'You are not authorized to create about', 400);
            } else {
                $about = About::create([
                    'title' => $request->input('title'),
                    'details' => $request->input('details'),
                    'user_id' => $userId,
                ]);

                return ResponseHelper::Out(true, 'About Created Successfully', 200);
            }
        } catch (Exception $e) {
            return ResponseHelper::Out(false, 'About Creation Failed', 500);
        }
    }
    // Create About End ***************************************

    // Update About Start ************************************
    public function updateAbout($request)
    {
        try {
            $userId = $request->header('userId');
            $role = $request->header('role');
            if ($role != 'admin') {
                return ResponseHelper::Out(false, 'You are not authorized to update about', 400);
            } else {
                $about = About::updateOrCreate(
                    ['user_id' => $userId], // Check if the about exists
                    [
                        'title' => $request->input('title'),
                        'details' => $request->input('details'),
                    ]
                );

                return ResponseHelper::Out(true, 'About Updated Successfully', 200);
            }
        } catch (Exception $e) {
            return ResponseHelper::Out(false, 'About Update Failed', 500);
        }
    }
    // Update About End **************************************

    // Delete About Start ************************************
    public function deleteAbout($request)
    {
        try {
            $userId = $request->header('userId');
            $role = $request->header('role');
            if ($role != 'admin') {
                return ResponseHelper::Out(false, 'You are not authorized to delete about', 400);
            } else {
                $about = About::where('user_id', $userId)->delete();

                return ResponseHelper::Out(true, 'About Deleted Successfully', 200);
            }
        } catch (Exception $e) {
            return ResponseHelper::Out(false, 'About Deletion Failed', 500);
        }
    }
    // Delete About End **************************************

    // About List Start ************************************
    public function getAbout($request)
    {
        try {
            $userId = $request->header('userId');
            $role = $request->header('role');
            if ($role != 'admin') {
                return ResponseHelper::Out(false, 'You are not authorized to get about', 400);
            } else {
                $about = About::where('user_id', $userId)->first();

                return ResponseHelper::Out(true, $about, 200);
            }
        } catch (Exception $e) {
            return ResponseHelper::Out(false, 'About Fetch Failed', 500);
        }
    }
    // About List End **************************************
}

<?php

namespace App\Services;

use App\Helper\ResponseHelper;
use App\Models\User;
use Exception;

class userRoleService
{
    // User role Management Start ************************************
    public function updateRole($request)
    {
        try {
            $userId = $request->header('userId');
            $role = $request->header('role');
            if ($role != 'admin') {
                return ResponseHelper::Out(false, 'You are not authorized to update role', 400);
            } else {
                $user = User::where('id', $request->input('id'))->update(['role' => $request->input('role')]);

                return ResponseHelper::Out(true, 'role Updated Successfully', 200);
            }
        } catch (Exception $e) {
            return ResponseHelper::Out(false, 'role Update Failed', 500);
        }
    }
    // User role Management End ************************************

    // Get User Start ************************************
    public function getUser($request)
    {
        try {
            $userId = $request->header('userId');
            $role = $request->header('role');
            if ($role != 'admin') {
                return ResponseHelper::Out(false, 'You are not authorized to get user', 400);
            } else {
                $user = User::where('role', 'user')->get();

                return ResponseHelper::Out(true, $user, 200);
            }
        } catch (Exception $e) {
            return ResponseHelper::Out(false, 'User Fetch Failed', 500);
        }

    }
    // Get User End ************************************

    // Get Admin Start ************************************
    public function getAdmin($request)
    {
        try {
            $userId = $request->header('userId');
            $role = $request->header('role');
            if ($role != 'admin') {
                return ResponseHelper::Out(false, 'You are not authorized to get admin', 400);
            } else {
                $user = User::where('role', 'admin')->get();

                return ResponseHelper::Out(true, $user, 200);
            }
        } catch (Exception $e) {
            return ResponseHelper::Out(false, 'Admin Fetch Failed', 500);
        }
    }
    // Get Admin End ************************************

    // Delete User Start ************************************
    public function deleteUser($request)
    {
        try {
            // Fetch headers
            $userId = $request->header('userId');
            $role = $request->header('role');

            // Only allow admin users to delete other users
            if ($role !== 'admin') {
                return ResponseHelper::Out(false, 'You are not authorized to delete users', 400);
            }

            // Fetch the user being deleted
            $userToDelete = User::find($request->input('id'));
            if (! $userToDelete) {
                return ResponseHelper::Out(false, 'User not found', 404);
            }

            // Prevent deletion of admin users
            if ($userToDelete->role === 'admin') {
                return ResponseHelper::Out(false, 'Admin users cannot be deleted', 403);
            }

            // Delete the user
            $userToDelete->delete();

            return ResponseHelper::Out(true, 'User Deleted Successfully', 200);

        } catch (Exception $e) {
            return ResponseHelper::Out(false, 'User Deletion Failed', 500);
        }
    }

    // Delete User End ************************************

}

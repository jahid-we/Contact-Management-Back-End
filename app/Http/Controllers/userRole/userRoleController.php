<?php

namespace App\Http\Controllers\userRole;

use App\Http\Controllers\Controller;
use App\Services\userRoleService;
use Illuminate\Http\Request;

class userRoleController extends Controller
{
    protected $userRoleService;

    public function __construct(userRoleService $userRoleService)
    {
        $this->userRoleService = $userRoleService;
    }

    // User role Management Start ************************************
    public function updateRole(Request $request)
    {
        return $this->userRoleService->updateRole($request);
    }
    // User role Management End **************************************

    // Get User Start ************************************
    public function getUser(Request $request)
    {
        return $this->userRoleService->getUser($request);
    }
    // Get User End **************************************

    // Get Admin Start ************************************
    public function getAdmin(Request $request)
    {
        return $this->userRoleService->getAdmin($request);
    }
    // Get Admin End **************************************

    // Delete User Start ************************************
    public function deleteUser(Request $request)
    {
        return $this->userRoleService->deleteUser($request);
    }
    // Delete User End **************************************
}

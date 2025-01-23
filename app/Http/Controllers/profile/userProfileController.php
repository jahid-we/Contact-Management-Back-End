<?php

namespace App\Http\Controllers\profile;

use App\Http\Controllers\Controller;
use App\Services\userProfileService;
use Illuminate\Http\Request;

class userProfileController extends Controller
{
    protected $userProfileService;

    public function __construct(userProfileService $userProfileService)
    {

        $this->userProfileService = $userProfileService;

    }

    // Create Profile Start ************************************
    public function createProfile(Request $request)
    {
        return $this->userProfileService->createProfile($request);
    }
    // Create Profile End ***************************************

    // Update Profile Start ************************************
    public function updateProfile(Request $request)
    {
        return $this->userProfileService->updateProfile($request);
    }
    // Update Profile End **************************************

    // Delete Profile Start ************************************
    public function deleteProfile(Request $request)
    {
        return $this->userProfileService->deleteProfile($request);
    }
    // Delete Profile End ***************************************

    // Get Profile Start ********************************************
    public function getProfile(Request $request)
    {
        return $this->userProfileService->getProfile($request);
    }
    // Get Profile End **********************************************
}

<?php

namespace App\Http\Controllers\about;

use App\Http\Controllers\Controller;
use App\Services\aboutService;
use Illuminate\Http\Request;

class aboutController extends Controller
{
    // This is the about service instance
    protected $aboutService;

    // This is the constructor
    public function __construct(aboutService $aboutService)
    {
        $this->aboutService = $aboutService;
    }

    // Create About Start ************************************
    public function createAbout(Request $request)
    {
        return $this->aboutService->createAbout($request);
    }
    // Create About End ***************************************

    // Update About Start ************************************
    public function updateAbout(Request $request)
    {
        return $this->aboutService->updateAbout($request);
    }
    // Update About End ***************************************

    // Delete About Start ************************************
    public function deleteAbout(Request $request)
    {
        return $this->aboutService->deleteAbout($request);
    }
    // Delete About End ***************************************

    // Get About Start ************************************
    public function getAbout(Request $request)
    {
        return $this->aboutService->getAbout($request);
    }
    // Get About End ***************************************

}

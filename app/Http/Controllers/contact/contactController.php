<?php

namespace App\Http\Controllers\contact;

use App\Http\Controllers\Controller;
use App\Services\ContactService;
use Illuminate\Http\Request;

class contactController extends Controller
{
    protected $contactService;

    public function __construct(ContactService $contactService)
    {
        $this->contactService = $contactService;
    }

    // Create Contact Start ************************************
    public function createContact(Request $request)
    {
        return $this->contactService->createContact($request);
    }
    // Create Contact End ***************************************

    // Contact List Start ************************************
    public function contactList(Request $request)
    {
        return $this->contactService->contactList($request);
    }
    // Contact List End ***************************************

    // Contact Update Start ************************************
    public function updateContact(Request $request)
    {
        return $this->contactService->updateContact($request);
    }
    // Contact Update End ***************************************

    // Contact Delete Start ************************************
    public function deleteContact(Request $request)
    {
        return $this->contactService->deleteContact($request);
    }
    // Contact Delete End ***************************************

    // Contact List By Id Start ************************************
    public function contactById(Request $request)
    {
        return $this->contactService->contactById($request);
    }
    // Contact List By Id End ***************************************

    // Contact Count Start ************************************
    public function contactCount(Request $request)
    {
        return $this->contactService->contactCount($request);
    }
    // Contact Count End ***************************************
}

<?php

namespace App\Http\Controllers\socialLink;

use App\Http\Controllers\Controller;
use App\Services\socialLinkService;
use Illuminate\Http\Request;

class socialLinkController extends Controller
{
    protected $socialLinkService;

    public function __construct(socialLinkService $socialLinkService)
    {
        $this->socialLinkService = $socialLinkService;
    }

    // Create Social Link Start ************************************
    public function createSocialLink(Request $request)
    {
        return $this->socialLinkService->createSocialLink($request);
    }
    // Create Social Link End ***************************************

    // Update Social Link Start ************************************
    public function updateSocialLink(Request $request)
    {
        return $this->socialLinkService->updateSocialLink($request);
    }
    // Update Social Link End **************************************

    // Delete Social Link Start ************************************
    public function deleteSocialLink(Request $request)
    {
        return $this->socialLinkService->deleteSocialLink($request);
    }
    // Delete Social Link End ***************************************

    // Get Social Link Start ************************************
    public function getSocialLink(Request $request)
    {
        return $this->socialLinkService->getSocialLink($request);
    }
    // Get Social Link End ***************************************

}

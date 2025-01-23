<?php

namespace App\Services;

use App\Helper\ResponseHelper;
use App\Models\SocialLink;
use Exception;

class socialLinkService
{
    // Create Social Link Start ************************************
    public function createSocialLink($request)
    {
        try {
            $userId = $request->header('userId');

            // Ensure that a valid User ID is provided
            if (! $userId) {
                return ResponseHelper::Out(false, 'User ID is required', 400);
            }

            $socialLink = SocialLink::create([
                'twitterLink' => $request->input('twitterLink'),
                'githubLink' => $request->input('githubLink'),
                'linkedinLink' => $request->input('linkedinLink'),
                'user_id' => $userId,
            ]);

            return ResponseHelper::Out(true, 'Social Link Created Successfully', 200);
        } catch (Exception $e) {
            return ResponseHelper::Out(false, 'Social Link Creation Failed', 500);
        }
    }
    // Create Social Link End ***************************************

    // Update Social Link Start ************************************
    public function updateSocialLink($request)
    {
        try {
            $userId = $request->header('userId');

            // Ensure that a valid User ID is provided
            if (! $userId) {
                return ResponseHelper::Out(false, 'User ID is required', 400);
            }
            SocialLink::updateOrCreate(
                ['user_id' => $userId], // Check if the social link exists
                [
                    'twitterLink' => $request->input('twitterLink'),
                    'githubLink' => $request->input('githubLink'),
                    'linkedinLink' => $request->input('linkedinLink'),
                ]
            );

            return ResponseHelper::Out(true, 'Social Link Updated Successfully', 200);
        } catch (Exception $e) {
            return ResponseHelper::Out(false, 'Social Link Update Failed', 500);
        }
    }
    // Update Social Link End **************************************

    // Delete Social Link Start ************************************
    public function deleteSocialLink($request)
    {
        try {
            $userId = $request->header('userId');

            // Ensure that a valid User ID is provided
            if (! $userId) {
                return ResponseHelper::Out(false, 'User ID is required', 400);
            }
            SocialLink::where('user_id', $userId)->delete();

            return ResponseHelper::Out(true, 'Social Link Deleted Successfully', 200);
        } catch (Exception $e) {
            return ResponseHelper::Out(false, 'Social Link Deletion Failed', 500);
        }
    }
    // Delete Social Link End ***************************************

    // Get Social Link Start ************************************
    public function getSocialLink($request)
    {
        try {
            $userId = $request->header('userId');

            // Ensure that a valid User ID is provided
            if (! $userId) {
                return ResponseHelper::Out(false, 'User ID is required', 400);
            }
            $socialLink = SocialLink::where('user_id', $userId)->first();

            return ResponseHelper::Out(true, $socialLink, 200);
        } catch (Exception $e) {
            return ResponseHelper::Out(false, 'Social Link Fetch Failed', 500);
        }
    }
    // Get Social Link End **************************************

}

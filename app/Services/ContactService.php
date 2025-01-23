<?php

namespace App\Services;

use App\Helper\ResponseHelper;
use App\Models\Contact;
use Exception;

class ContactService
{
    // Create Contact Start ************************************
    public function createContact($request)
    {
        try {
            $userId = $request->header('userId');

            $name = $request->input('name');
            $email = $request->input('email');
            $phone = $request->input('phone');
            $address = $request->input('address');
            $about = $request->input('about');
            $profession = $request->input('profession');
            $contact = Contact::create([
                'name' => $name,
                'email' => $email,
                'phone' => $phone,
                'address' => $address,
                'about' => $about,
                'profession' => $profession,
                'user_id' => $userId,
            ]);

            return ResponseHelper::Out(true, 'Contact Created Successfully', 200);

        } catch (Exception $e) {
            return ResponseHelper::Out(false, 'Something went wrong', 500);
        }
    }
    // Create Contact End ***************************************

    // Contact List Start ************************************
    public function contactList($request)
    {
        try {
            $userId = $request->header('userId');
            $contactList = Contact::where('user_id', $userId)->get();

            return ResponseHelper::Out(true, $contactList, 200);
        } catch (Exception $e) {
            return ResponseHelper::Out(false, 'Something went wrong', 500);
        }
    }
    // Contact List End ***************************************

    // Contact Update Start ************************************
    public function updateContact($request)
    {
        try {
            $contactId = $request->input('contact_id');
            $contact = Contact::find($contactId);
            if (! $contact) {
                return ResponseHelper::Out(false, 'Contact Not Found', 404);
            } else {
                $updateContact = Contact::where('id', $contactId)->update([
                    'name' => $request->input('name'),
                    'email' => $request->input('email'),
                    'phone' => $request->input('phone'),
                    'address' => $request->input('address'),
                    'about' => $request->input('about'),
                    'profession' => $request->input('profession'),
                ]);
            }

            return ResponseHelper::Out(true, 'Contact Updated Successfully', 200);
        } catch (Exception $e) {
            return ResponseHelper::Out(false, 'Something went wrong', 500);
        }
    }
    // Contact Update End ***************************************

    // Contact Delete Start ************************************
    public function deleteContact($request)
    {
        try {
            $contactId = $request->input('contact_id');
            $contact = Contact::find($contactId);
            if (! $contact) {
                return ResponseHelper::Out(false, 'Contact Not Found', 404);
            } else {
                $deleteContact = Contact::where('id', $contactId)->delete();
            }

            return ResponseHelper::Out(true, 'Contact Deleted Successfully', 200);
        } catch (Exception $e) {
            return ResponseHelper::Out(false, 'Something went wrong', 500);
        }
    }
    // Contact Delete End ***************************************

    // Contact List By Id Start ************************************
    public function contactById($request)
    {
        try {
            $userId = $request->header('userId');
            $contactId = $request->input('contact_id');
            $contact = Contact::where('id', $contactId)->where('user_id', $userId)->first();
            if (! $contact) {
                return ResponseHelper::Out(false, 'Contact Not Found', 404);
            } else {
                return ResponseHelper::Out(true, $contact, 200);
            }
        } catch (Exception $e) {
            return ResponseHelper::Out(false, 'Something went wrong', 500);
        }
    }
    // Contact List By Id End ***************************************

    // Contact Count Start ************************************
    public function contactCount($request)
    {
        try {
            $userId = $request->header('userId');
            $contactCount = Contact::where('user_id', $userId)->count();

            return ResponseHelper::Out(true, $contactCount, 200);
        } catch (Exception $e) {
            return ResponseHelper::Out(false, 'Something went wrong', 500);
        }
    }
    // Contact Count End ***************************************
}

<?php
namespace App\Http\Controllers\report;

use Exception;
use App\Models\Contact;
use Illuminate\Http\Request;
use App\Helper\ResponseHelper;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\Controller;

class contactPdfcontroller extends Controller
{
    public function ReportPage()
    {
        return view('pages.dashboard.report-page');
    }

    // Get Contact List Start ************************************
    public function getContactList(Request $request)
    {
        try {
            $userId = $request->header('userId');
            $contactList = Contact::where('user_id', $userId)->get();

            // dd($contactList);

            // Pass the contact list as an array to the view
            $pdf = Pdf::loadView('reports.contactreport', ['contactList' => $contactList]);
            return $pdf->stream('contacts.pdf');
        } catch (Exception $e) {
            return ResponseHelper::Out(false, 'Something went wrong', 500);
        }
    }
    // Get Contact List End ************************************

    // Get Contact List By Id Start ************************************
    public function getContactListById(Request $request)
{
    try {
        $userId = $request->header('userId');
        $contactId = $request->contact_id;
        $contactList = Contact::where('id', $contactId)
            ->where('user_id', $userId)
            ->get();

        // Pass the contact list as an array to the view
        $pdf = Pdf::loadView('reports.contactReportById', ['contactList' => $contactList]);

        // Stream the PDF for preview in the browser
        return $pdf->stream('contactsById.pdf');
    } catch (Exception $e) {
        return ResponseHelper::Out(false, 'Something went wrong', 500);
    }
}

}

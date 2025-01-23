<?php

namespace App\Http\Controllers\page;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class adminUserPageController extends Controller
{
    public function contactPage(Request $request): View
    {
        $userRole=$request->header('role');
        if($userRole=='admin'){
            return view('pages.dashboard.admin-all-O-user.contact-page');
        }else{
            return view('pages.auth.login-page');
        }

    }
}

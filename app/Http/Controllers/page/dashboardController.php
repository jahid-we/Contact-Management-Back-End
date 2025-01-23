<?php

namespace App\Http\Controllers\page;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class dashboardController extends Controller
{
    public function DashboardPage( Request $request): View
    {
        $userRole=$request->header('role');
        if($userRole=='admin'){
            return view('pages.dashboard.admin-dashboard.dashboard-page');
        }
        return view('pages.dashboard.dashboard-page');
    }
}

<?php

namespace App\Http\Controllers\page;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class profileController extends Controller
{
    public function ProfilePage(): View
    {
        return view('pages.dashboard.profile-page');
    }
}

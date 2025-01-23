<?php

namespace App\Http\Controllers\page;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class passChangeController extends Controller
{
    public function passwordChangePage(): View
    {
        return view('pages.auth.passwordChange-page');
    }
}

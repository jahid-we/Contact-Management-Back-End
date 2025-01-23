<?php

namespace App\Http\Controllers\page;

use App\Http\Controllers\Controller;

class pageController extends Controller
{
    // Home page
    public function home()
    {
        return view('layout.app');
    }

    // Login page
    public function login()
    {
        return view('auth.login');
    }
}

<?php

namespace App\Http\Controllers\page;

use App\Http\Controllers\Controller;

class homeController extends Controller
{
    public function HomePage()
    {
        return view('pages.home');
    }
}

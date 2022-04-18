<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function createProfile()
    {
        
        return view('profile_create');
    }
}

<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class frontendAuthController extends Controller
{
    public function login()
    {
        return view('frontend.auth.login');
    }
}

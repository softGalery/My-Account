<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Homecontroller extends Controller
{
    public function index()
    {
        return view('backend.index');
    }
    public function useLogin()
    {
        return view('backend.auth.login-page');
    }
}

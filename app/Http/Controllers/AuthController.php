<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function index()
    {
        $title = 'Authentikasi Admin';
        return view('auth/login', compact('title'));
    }
}

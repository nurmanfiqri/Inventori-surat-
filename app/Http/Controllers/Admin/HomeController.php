<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends BaseController
{
    public function index(){
        return view('admin.home');
        
    }
}

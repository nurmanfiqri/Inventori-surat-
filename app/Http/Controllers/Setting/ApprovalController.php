<?php

namespace App\Http\Controllers\Setting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ApprovalController extends Controller
{
    public function index()
    {
        $title = 'Setting Approval';
        return view('setting.approval.index', compact('title'));
    }
}

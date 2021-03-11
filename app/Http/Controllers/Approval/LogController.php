<?php

namespace App\Http\Controllers\Approval;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Approval\ApprovalModel;
use DB;

class LogController extends Controller
{
    public function index()
    {
        $title = 'Approval Log';
        return view('approval.log.index', compact('title'));
    }
}

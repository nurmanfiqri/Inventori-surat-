<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use DB;

class ApiInboxController extends Controller
{
    public function ct_inbox(Request $request){
        $id_karyawan = Session::get('id_karyawan');
        $inbox = DB::select("select a.id, a.file, a.tanggal, 'url' from master a join approver_list c on a.id = c.document_id and (a.apv_level + 1) = c.apv_level where a.doc_status <> 'Completed' and a.doc_status <> 'Draft' and c.user_id = '$id_karyawan'");

        return response()->json(count($inbox));
    }
}

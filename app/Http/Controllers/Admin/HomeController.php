<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use DB;

class HomeController extends BaseController
{
    public function index(){
        return view('admin.home');
    }

    public function notifikasi(Request $request){
        $title = 'Notifikasi';
        return view('admin.notifikasi', compact('title'));
    }

    public function dataInbox(Request $request){
        $id_karyawan = Session::get('id_karyawan');
        $inbox = DB::select("select a.id, a.tanggal, a.nama, b.nama_karyawan from master a join karyawan b on b.id = a.id_user join approver_list c on a.id = c.document_id and (a.apv_level + 1) = c.apv_level where a.doc_status <> 'Completed' and a.doc_status <> 'Draft' and c.user_id = '$id_karyawan'");

        return response()->json($inbox);
    }
}

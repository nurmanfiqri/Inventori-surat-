<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class ApiSelect2Controller extends Controller
{
    public function divisi(Request $request){
        if($request->has('q')){
            $search = $request->q;
            $data = DB::table('divisi_h')
            ->select('nama_divisi', 'id')
            ->where('is_delete', 0)
            ->where('nama_divisi', 'LIKE', "%$search%")
            ->get();
        } else{
            $data = DB::table('divisi_h')
            ->select('nama_divisi', 'id')
            ->where('is_delete', 0)
            ->get();
        }
        return response()->json($data);
    }

    public function jabatan(Request $request){
        if($request->has('q')){
            $search = $request->q;
            $data = DB::table('divisi_d')
            ->select('nama_jabatan', 'id')
            ->where('is_delete', 0)
            ->where('nama_jabatan', 'LIKE', "%$search%")
            ->get();
        } else {
            $data = DB::table('divisi_d')
            ->where('is_delete', 0)
            ->where('id_divisi', $request->divisi)
            ->get();
        }
        return response()->json($data);
    }
}

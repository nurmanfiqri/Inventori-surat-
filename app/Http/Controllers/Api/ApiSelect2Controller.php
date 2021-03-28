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

    public function divisiLine(Request $request){
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

    public function jabatanLine(Request $request){
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

    

    public function user(Request $request){
        if($request->has('q')){
            $search = $request->q;
            $data = DB::table('karyawan')
            ->select('nama_karyawan', 'id')
            ->where('is_delete', 0)
            ->where('nama_karyawan', 'LIKE', "%$search%")
            ->get();
        } else {
            $data = DB::table('karyawan')
            ->select('nama_karyawan', 'id')
            ->where('is_delete', 0)
            ->get();
        }
        return response()->json($data);
    }

    public function role(Request $request){
        if($request->has('q')){
            $search = $request->q;
            $data = DB::table('role')
            ->select('role', 'id')
            ->where('role', 'LIKE', "%$search%")
            ->where('is_delete', 0)
            ->get();
        } else {
            $data = DB::table('role')
            ->select('role', 'id')
            ->where('is_delete', 0)
            ->get();
        }
        return response()->json($data);
    }

    public function unit(Request $request){
        if($request->has('q')){
            $search = $request->q;
            $data = DB::table('setting_workflow')
            ->select('nama_workflow', 'id')
            ->where('nama_workflow', 'LIKE', "%$search%")
            ->where('is_delete', 0)
            ->get();
        } else {
            $data = DB::table('setting_workflow')
            ->select('nama_workflow', 'id')
            ->where('is_delete', 0)
            ->get();
        }
        return response()->json($data);
    }

    public function karyawan(Request $request){
        if($request->has('q')){
            $search = $request->q;
            $data = DB::table('karyawan')
            ->select('karyawan.id as id', 'karyawan.nama_karyawan as nama_karyawan')
            ->leftJoin('setting_role', 'setting_role.id_karyawan', '=', 'karyawan.id')
            ->where('karyawan.nama_karyawan', 'LIKE', "%$search%")
            ->where('setting_role.id', NULL)
            ->where('karyawan.is_delete', 0)
            ->get();
        } else {
            $data = DB::table('karyawan')
            ->select('karyawan.id as id', 'karyawan.nama_karyawan as nama_karyawan')
            ->leftJoin('setting_role', 'setting_role.id_karyawan', '=', 'karyawan.id')
            ->where('setting_role.id', NULL)
            ->where('karyawan.is_delete', 0)
            ->get();
        }
        // dd($data);
        return response()->json($data);
    }
}

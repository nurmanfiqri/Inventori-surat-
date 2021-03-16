<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Setting\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ApiUserController extends Controller
{
    public function list(Request $request){
        $list = User::where('is_delete', 0)->with('karyawan', 'role')->get();

        return DataTables::of($list)
        ->addIndexColumn()
        ->addColumn('aksi', function($data){
            $button = '';
            $button .= '&nbsp';
            $button .= '<button type="button" title="Edit" data-id="' . $data->id . '" onclick="editView(' . $data->id . ')" class="btn btn-primary btn-sm"> 
            <i class="fas fa-fw fa-edit"></i> Edit
            </button>';
            $button .= '&nbsp';
            $button .= '<button type="button" title="Hapus" data-id="' . $data->id . '" onclick="hapus(' . $data->id . ')" class="btn btn-warning btn-sm"> 
            <i class="fas fa-fw fa-trash"></i> Hapus
            </button>';
            $button .= '&nbsp';
            $button .= '<button type="button" title="Detail" data-id="' . $data->id . '" onclick="detail(' . $data->id . ')" class="btn btn-info btn-sm"> 
            <i class="fas fa-fw fa-search"></i> Detail
            </button>';

            return $button;
        })
        ->addColumn('karyawan', function($data){
            return $data->karyawan->nama_karyawan;
        })
        ->addColumn('role', function($data){
            return $data->role->role;
        })
        ->addColumn('jabatan', function($data){
            $jabatan = $data->karyawan->jabatan;
            return $jabatan->nama_jabatan;
        })
        ->addColumn('divisi', function($data){
            $divisi = $data->karyawan->divisi;
            return $divisi->nama_divisi;
        })
        ->rawColumns(['aksi'])
        ->make(true);
    }
}

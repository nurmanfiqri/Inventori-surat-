<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Master\Divisi;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ApiJabatanController extends Controller
{
    public function list(Request $request)
    {
        $model = Divisi::where('is_delete', 0)->get();

        // dd($model);
        return DataTables::of($model)
            ->addIndexColumn()
            ->addColumn('akses', function ($data) {
                return $data->AksesRole->role;
                // dd($data->AksesRole->role);
            })
            ->addColumn('aksi', function ($data) {
                $button = '';
                $button .= '<a href="' . url("jabatan/jabatan/update/" . $data->id) . '" title = "Edit" data-id="' . $data->id . '" class="btn btn-warning btn-sm"> <i class="fas fa-edit"></i> Edit</a>';
                $button .= '&nbsp';
                $button .= '&nbsp';
                $button .= '<button type="button" title="Hapus" data-id="' . $data->id . '" onclick="hapus(' . $data->id . ')" class="btn btn-danger btn-sm"> 
                        <i class="fas fa-fw fa-trash"></i> Hapus
                    </button>';
                $button .= '&nbsp';

                return $button;
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }
}

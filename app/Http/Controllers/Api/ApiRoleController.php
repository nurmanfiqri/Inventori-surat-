<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Role\RoleAkses;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Models\Role\RoleModel;

class ApiRoleController extends Controller
{
    public function list()
    {
        $list = RoleModel::where('is_delete', 0)->get();
        // dd($list);
        return DataTables::of($list)
            ->addIndexColumn()
            ->addColumn('aksi', function ($data) {
                $button = '';
                $button .= '<a href="' . url("setting/role/update/" . $data->id) . '" title = "Edit" data-id="' . $data->id . '" class="btn btn-primary btn-sm"> <i class="fas fa-edit"></i> Edit</a>';
                $button .= '&nbsp';
                $button .= '&nbsp';
                $button .= '<button type="button" title="Hapus" data-id="' . $data->id . '" onclick="hapus(' . $data->id . ')" class="btn btn-warning btn-sm"> 
                            <i class="fas fa-fw fa-trash"></i> Hapus
                        </button>';
                $button .= '&nbsp';
                $button .= '&nbsp';
                $button .= '<a href="' . url("setting/role/view/" . $data->id) . '" title = "Detail Role" data-id="' . $data->id . '" class="btn btn-info btn-sm"> <i class="fas fa-search"></i> Detail</a>';

                return $button;
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }

    public function Api(Request $request)
    {

        $id = $request->id;
        if ($id == null) {
            $model = RoleModel::where('is_delete', 0)->get();
        } else {
            $model = RoleModel::query()->where(['id' => $id])->first();
        }

        return response()->json([
            'status' => 200,
            'message' => 'respon plain',
            'data' => $model,
        ]);
    }

    public function roleAkses(){
        $list = RoleAkses::where('is_delete', 0)->get();

        return DataTables::of($list)
        ->addIndexColumn()
        ->addColumn('karyawan', function($data){
            return $data->karyawan->nama_karyawan;
        })
        ->addColumn('role', function($data){
            return $data->role->role; ///role->nama_role
        })
        ->addColumn('aksi', function($data){
            $button = '';
            $button .= '<a href="' . url("setting/role-akses/update/" . $data->id) . '" title = "Edit" data-id="' . $data->id . '" class="btn btn-primary btn-sm"> <i class="fas fa-edit"></i> Edit</a>';
            $button .= '&nbsp';
            $button .= '&nbsp';
            $button .= '<button type="button" title="Hapus" data-id="' . $data->id . '" onclick="hapus(' . $data->id . ')" class="btn btn-warning btn-sm"> 
                        <i class="fas fa-fw fa-trash"></i> Hapus
                    </button>';
            $button .= '&nbsp';
            $button .= '&nbsp';
            $button .= '<a href="' . url("setting/role-akses/view/" . $data->id) . '" title = "Detail Role" data-id="' . $data->id . '" class="btn btn-info btn-sm"> <i class="fas fa-search"></i> Detail</a>';

            return $button;
        })
        ->rawColumns(['aksi'])
        ->make(true);
    }
}

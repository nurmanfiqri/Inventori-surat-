<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Setting\Department;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ApiDepartmentController extends Controller
{
    public function list(Request $request)
    {
        $model = Department::where('is_delete', 0)->get();

        // dd($model);
        return DataTables::of($model)
            ->addIndexColumn()
            ->addColumn('name', function ($data) {
                $render = '';
                $render .= '<h7>' . $data->department . '</h7><br>';
                $render .= '<h7>(' . $data->singkatan . ')</h7>';

                return $render;
            })
            ->addColumn('aksi', function ($data) {
                $button = '';
                $button .= '<a href="' . url("jabatan/department/update/" . $data->id) . '" title = "Edit" data-id="' . $data->id . '" class="btn btn-warning btn-sm"> <i class="fas fa-edit"></i> Edit</a>';
                $button .= '&nbsp';
                $button .= '&nbsp';
                $button .= '<button type="button" title="Hapus" data-id="' . $data->id . '" onclick="hapus(' . $data->id . ')" class="btn btn-danger btn-sm"> 
                        <i class="fas fa-fw fa-trash"></i> Hapus
                    </button>';
                $button .= '&nbsp';

                return $button;
            })
            ->rawColumns(['aksi', 'name'])
            ->make(true);
    }
}

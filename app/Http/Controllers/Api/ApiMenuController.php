<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Models\Menu\MenuModel;

class ApiMenuController extends Controller
{
    public function list()
    {
        $list = MenuModel::where('is_delete', 0)->get();
        // dd($list);
        return DataTables::of($list)
            ->addIndexColumn()
            ->addColumn('aksi', function ($data) {
                $button = '';
                $button .= '<a href="' . url("menu/update/" . $data->id) . '" title = "Edit" data-id="' . $data->id . '" class="btn btn-primary btn-sm"> <i class="fas fa-edit"></i> Edit</a>';
                $button .= '&nbsp';
                $button .= '<button type="button" title="Hapus" data-id="' . $data->id . '" onclick="hapus(' . $data->id . ')" class="btn btn-warning btn-sm"> 
                            <i class="fas fa-fw fa-trash"></i> Hapus
                        </button>';
                $button .= '&nbsp';

                return $button;
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }

    public function Api(Request $request)
    {

        $id = $request->id;
        if ($id == null) {
            $model = MenuModel::where('is_delete', 0)->get();
        } else {
            $model = MenuModel::query()->where(['id' => $id])->first();
        }

        return response()->json([
            'status' => 200,
            'message' => 'respon plain',
            'data' => $model,
        ]);
    }
}

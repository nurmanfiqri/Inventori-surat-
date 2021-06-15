<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Setting\FolderSurat;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ApiFolderSuratController extends Controller
{
    public function list(Request $request)
    {
        $model = FolderSurat::where('is_delete', 0)->get();

        return DataTables::of($model)
            ->addIndexColumn()
            ->addColumn('aksi', function ($data) {
                $button = '';
                $button .= '<a href="' . url("setting/folder-surat/update/" . $data->id) . '" title = "Edit" data-id="' . $data->id . '" class="btn btn-warning btn-sm"> <i class="fas fa-edit"></i> Edit</a>';
                $button .= '&nbsp';
                $button .= '&nbsp';
                $button .= '<button type="button" title="Hapus" data-id="' . $data->id . '" onclick="hapus(' . $data->id . ')" class="btn btn-danger btn-sm"> 
                        <i class="fas fa-fw fa-trash"></i> Hapus
                    </button>';
                $button .= '&nbsp';
                $button .= '&nbsp';
                $button .= '<a href="' . url("setting/folder-surat/view/" . $data->id) . '" title = "Detail Divisi" data-id="' . $data->id . '" class="btn btn-primary btn-sm"> <i class="fas fa-search"></i> Detail</a>';
                $button .= '&nbsp';

                return $button;
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }
}

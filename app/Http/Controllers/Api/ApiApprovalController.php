<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Models\Approval\ApprovalModel;
use App\Models\Setting\Workflow;
use App\Models\Setting\UnitKerja;

class ApiApprovalController extends Controller
{
    public function list()
    {
        $list = ApprovalModel::where('is_delete', 0)->get();
        // dd($list);
        return DataTables::of($list)
            ->addIndexColumn()
            ->addColumn('aksi', function ($data) {
                $button = '';
                $button .= '<a href="' . url("approval/approval_list/update/" . $data->id) . '" title = "Edit" data-id="' . $data->id . '" class="btn btn-primary btn-sm"> <i class="fas fa-edit"></i> Edit</a>';
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
            $model = ApprovalModel::where('is_delete', 0)->get();
        } else {
            $model = ApprovalModel::query()->where(['id' => $id])->first();
        }

        return response()->json([
            'status' => 200,
            'message' => 'respon plain',
            'data' => $model,
        ]);
    }

    public function log()
    {
        $log = ApprovalModel::get();
        // dd($log);
        return DataTables::of($log)
            ->addIndexColumn()
            ->addColumn('aksi', function ($data) {
                $button = '';
                $button .= '<a href="' . url("approval/approval_log/update/" . $data->id) . '" title = "Edit" data-id="' . $data->id . '" class="btn btn-primary btn-sm"> <i class="fas fa-edit"></i> Edit</a>';
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

    public function workflow(Request $request)
    {
        $list = Workflow::where('is_delete', 0)->get();
        return DataTables::of($list)
            ->addIndexColumn()
            ->addColumn('aksi', function ($data) {
                $button = '';
                $button .= '<a href="' . url("setting/workflow/update/" . $data->id) . '" title = "Edit" data-id="' . $data->id . '" class="btn btn-primary btn-sm"> <i class="fas fa-edit"></i> Edit</a>';
                $button .= '&nbsp';
                $button .= '<button type="button" title="Hapus" data-id="' . $data->id . '" onclick="hapus(' . $data->id . ')" class="btn btn-warning btn-sm"> 
                        <i class="fas fa-fw fa-trash"></i> Hapus
                    </button>';
                $button .= '&nbsp';

                return $button;
            })
            ->addColumn('status', function ($data) {
                $status = '';
                if ($data->status == 1) {
                    $status = 'Aktif';
                } else {
                    $status = 'Tidak Aktif';
                }
                return $status;
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }

    public function unitkerja()
    {
        $list = UnitKerja::where('is_delete', 0)->get();
        // dd($list);
        return DataTables::of($list)
            ->addIndexColumn()
            ->addColumn('aksi', function ($data) {
                $button = '';
                $button .= '<a href="' . url("setting/unit_kerja/update/" . $data->id) . '" title = "Edit" data-id="' . $data->id . '" class="btn btn-primary btn-sm"> <i class="fas fa-edit"></i> Edit</a>';
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
}

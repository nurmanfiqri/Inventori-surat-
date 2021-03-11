<?php

namespace App\Http\Controllers\Approval;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Approval\ApprovalModel;
use DB;

class ListController extends Controller
{
    public function index()
    {
        $title = 'Approval Log';
        return view('approval.list.index', compact('title'));
    }

    public function create(Request $request)
    {

        $model = new ApprovalModel();

        if ($request->isMethod('post')) {
            DB::beginTransaction();
            try {
                // dd($request->all());
                $model = new ApprovalModel();
                $model->nama = $request->nama;
                $model->is_delete = 0;
                $model->save();
                DB::commit();
                return redirect('approval/approval_list')->with(['success' => 'Informasi baru berhasil disimpan']);
            } catch (\Exception $e) {
                DB::rollBack();
                return $e;
            }
        }
        return view('approval.list.create');
    }

    public function update(Request $request)
    {
        $model = ApprovalModel::query()->where(['id' => $request->id])->first();
        $title = 'Update Informasi';
        if ($request->isMethod('post')) {
            DB::beginTransaction();
            try {
                $model = ApprovalModel::find($request->id);
                $model->nama = $request->nama;
                $model->is_delete = 0;

                $model->update();
                DB::commit();
                return redirect('approval/approval_list')->with(['success' => 'Data Berhasil di Update']);
            } catch (\Exceptopn $e) {
                DB::rollBack();
                return $e;
            }
        }
        return view('approval.list.create', compact('title', 'model'));
    }

    public function delete($id)
    {
        $model = ApprovalModel::where(['id' => $id])->first();

        if (empty($model)) {
            abort(404);
        }

        DB::beginTransaction();
        try {
            $model->is_delete = 1;
            $model->save();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return $e;
        }
        return response()->json([
            'message' => 'Data berhasil dihapus',
        ]);
    }
}

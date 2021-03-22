<?php

namespace App\Http\Controllers\Setting;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Setting\Workflow;

class WorkflowController extends BaseController
{
    public function index()
    {
        $title = 'Setting Approval';
        return view('setting.approval.index', compact('title'));
    }

    public function create(Request $request)
    {

        $model = new Workflow();

        if ($request->isMethod('post')) {
            DB::beginTransaction();
            try {
                // dd($request->all());
                $model = new Workflow();
                $model->nama = $request->nama;
                $model->unit = $request->unit;
                $model->status = $request->status;
                $model->is_delete = 0;
                $model->save();
                DB::commit();
                return redirect('setting/workflow')->with(['success' => 'Informasi baru berhasil disimpan']);
            } catch (\Exception $e) {
                DB::rollBack();
                return $e;
            }
        }
        return view('setting.approval.create');
    }

    public function update(Request $request)
    {
        $model = Workflow::query()->where(['id' => $request->id])->first();
        $title = 'Update Informasi';
        if ($request->isMethod('post')) {
            DB::beginTransaction();
            try {
                $model = Workflow::find($request->id);
                $model->nama = $request->nama;
                $model->unit = $request->unit;
                $model->status = $request->status;
                $model->is_delete = 0;

                $model->update();
                DB::commit();
                return redirect('setting/workflow')->with(['success' => 'Data Berhasil di Update']);
            } catch (\Exceptopn $e) {
                DB::rollBack();
                return $e;
            }
        }
        return view('setting.approval.create', compact('title', 'model'));
    }

    public function delete($id)
    {
        $model = Workflow::where(['id' => $id])->first();

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

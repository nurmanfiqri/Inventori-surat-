<?php

namespace App\Http\Controllers\Setting;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting\UnitKerja;
use DB;

class UnitKerjaController extends BaseController
{
    public function index()
    {
        $title = 'Unit Kerja';
        return view('setting.unitkerja.index', compact('title'));
    }

    public function create(Request $request)
    {

        $model = new UnitKerja();

        if ($request->isMethod('post')) {
            DB::beginTransaction();
            try {
                // dd($request->all());
                $model = new UnitKerja();
                $model->nama = $request->nama;
                $model->is_delete = 0;
                $model->save();
                DB::commit();
                return redirect('setting/unit_kerja')->with(['success' => 'Informasi baru berhasil disimpan']);
            } catch (\Exception $e) {
                DB::rollBack();
                return $e;
            }
        }
        return view('setting.unitkerja.create', compact('model'));
    }

    public function update(Request $request)
    {
        $model = UnitKerja::query()->where(['id' => $request->id])->first();
        $title = 'Update Informasi';
        if ($request->isMethod('post')) {
            DB::beginTransaction();
            try {
                $model = UnitKerja::find($request->id);
                $model->nama = $request->nama;
                $model->is_delete = 0;

                $model->update();
                DB::commit();
                return redirect('setting/unit_kerja')->with(['success' => 'Data Berhasil di Update']);
            } catch (\Exceptopn $e) {
                DB::rollBack();
                return $e;
            }
        }
        return view('setting.unitkerja.create', compact('title', 'model'));
    }

    public function delete($id)
    {
        $model = UnitKerja::where(['id' => $id])->first();

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

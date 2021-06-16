<?php

namespace App\Http\Controllers\Jabatan;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Models\Setting\UnitKerja;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UnitKerjaController extends BaseController
{
    public function index()
    {
        $title = 'Pengaturan Unit Kerja';

        return view('jabatan.unit_kerja.index', compact('title'));
    }

    public function create(Request $request)
    {
        $model = new UnitKerja();

        if ($request->isMethod('post')) {
            DB::beginTransaction();

            try {
                $model = new UnitKerja();

                $model->unit_kerja = $request->unit_kerja;

                $model->is_delete = 0;

                $model->save();

                DB::commit();

                return redirect('jabatan/unit_kerja/view/' . $model->id);
            } catch (\Exception $e) {
                DB::rollback();
                return $e;
            }
        }

        return view('jabatan.unit_kerja.create', compact('model'));
    }

    public function update(Request $request)
    {
        $model = UnitKerja::query()->where(['id' => $request->id])->first();

        if ($request->isMethod('post')) {
            DB::beginTransaction();

            try {
                $model = UnitKerja::find($request->id)->first();

                $model->unit_kerja = $request->unit_kerja;

                $model->is_delete = 0;

                $model->save();

                DB::commit();

                return redirect('jabatan/unit_kerja/view/' . $model->id);
            } catch (\Exception $e) {
                DB::rollback();
                return $e;
            }
        }

        return view('jabatan.unit_kerja.create', compact('model'));
    }

    public function view($id)
    {
        $model = UnitKerja::query()->where(['id' => $id])->first();

        return view('jabatan.unit_kerja.view', compact('model'));
    }
}

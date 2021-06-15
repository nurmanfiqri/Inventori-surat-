<?php

namespace App\Http\Controllers\Setting;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Models\Setting\PrioritasSurat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PrioritasSuratController extends BaseController
{
    public function index()
    {
        $title = 'Pengaturan Prioritas Surat';

        return view('setting.prioritas_surat.index', compact('title'));
    }

    public function create(Request $request)
    {
        $model = new PrioritasSurat();

        if ($request->isMethod('post')) {
            DB::beginTransaction();

            try {
                $model = new PrioritasSurat();
                $model->prioritas_surat = $request->prioritas_surat;
                $model->kode = $request->kode;
                $model->warna = $request->warna;
                $model->is_delete = 0;

                $model->save();
                DB::commit();

                return redirect('setting/prioritas-surat/view/' . $model->id);
            } catch (\Exception $e) {
                DB::rollBack();
                return $e;
            }
        }
        return view('setting.prioritas_surat.create');
    }

    public function update(Request $request)
    {
        $model = PrioritasSurat::query()->where(['id' => $request->id])->first();

        if ($request->isMethod('post')) {
            DB::beginTransaction();
            try {
                $model = PrioritasSurat::find($request->id);

                $model->prioritas_surat = $request->prioritas_surat;
                $model->kode = $request->kode;
                $model->warna = $request->warna;
                $model->is_delete = 0;

                $model->update();
                DB::commit();
                return redirect('setting/prioritas-surat/view/' . $model->id);
            } catch (\Exception $e) {
                DB::rollback();
                return $e;
            }
        }
        return view('setting.prioritas_surat.create', compact('model'));
    }

    public function view(Request $request, $id)
    {
        $model = PrioritasSurat::where(['id' => $id])->first();

        return view('setting.prioritas_surat.view', compact('model'));
    }
}

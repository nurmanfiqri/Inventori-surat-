<?php

namespace App\Http\Controllers\Setting;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Models\Setting\SifatSurat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SifatSuratController extends BaseController
{
    public function index()
    {
        $title = 'Pengaturan Sifat Surat';

        return view('setting.sifat_surat.index', compact('title'));
    }

    public function create(Request $request)
    {
        $model = new SifatSurat();

        if ($request->isMethod('post')) {
            DB::beginTransaction();

            try {
                $model = new SifatSurat();
                $model->sifat_surat = $request->sifat_surat;
                $model->kode = $request->kode;
                $model->warna = $request->warna;
                $model->is_delete = 0;

                $model->save();
                DB::commit();

                return redirect('setting/sifat-surat/view/' . $model->id);
            } catch (\Exception $e) {
                Db::rollBack();
                return $e;
            }
        }
        return view('setting.sifat_surat.create');
    }

    public function update(Request $request)
    {
        $model = SifatSurat::query()->where(['id' => $request->id])->first();

        if ($request->isMethod('post')) {
            DB::beginTransaction();
            try {
                $model = SifatSurat::find($request->id);

                $model->sifat_surat = $request->sifat_surat;
                $model->kode = $request->kode;
                $model->warna = $request->warna;
                $model->is_delete = 0;

                $model->update();
                DB::commit();
                return redirect('setting/sifat-surat/view/' . $model->id);
            } catch (\Exception $e) {
                DB::rollback();
                return $e;
            }
        }
        return view('setting.sifat_surat.create', compact('model'));
    }

    public function view(Request $request, $id)
    {
        $model = SifatSurat::where(['id' => $id])->first();

        return view('setting.sifat_surat.view', compact('model'));
    }
}

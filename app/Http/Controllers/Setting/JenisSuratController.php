<?php

namespace App\Http\Controllers\Setting;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Models\Setting\JenisSurat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JenisSuratController extends BaseController
{
    public function index()
    {
        $title = 'Pengaturan Jenis Surat';

        return view('setting.jenis_surat.index', compact('title'));
    }

    public function create(Request $request)
    {
        $model = new JenisSurat();

        if ($request->isMethod('post')) {
            DB::beginTransaction();
            try {
                $model = new JenisSurat();
                $model->jenis_surat = $request->jenis_surat;
                $model->kode = $request->kode;
                $model->warna = $request->warna;
                $model->is_delete = 0;

                $model->save();
                DB::commit();

                return redirect('setting/jenis-surat/view/' . $model->id);
            } catch (\Exception $e) {
                DB::rollback();
                return $e;
            }
        }

        return view('setting.jenis_surat.create');
    }

    public function update(Request $request)
    {
        $model = JenisSurat::query()->where(['id' => $request->id])->first();

        if ($request->isMethod('post')) {
            DB::beginTransaction();
            try {
                $model = JenisSurat::find($request->id);

                $model->jenis_surat = $request->jenis_surat;
                $model->kode = $request->kode;
                $model->warna = $request->warna;
                $model->is_delete = 0;

                $model->update();
                DB::commit();
                return redirect('setting/jenis-surat/view/' . $model->id);
            } catch (\Exception $e) {
                DB::rollback();
                return $e;
            }
        }
        return view('setting.jenis_surat.create', compact('model'));
    }

    public function view(Request $request, $id)
    {
        $model = JenisSurat::where(['id' => $id])->first();

        return view('setting.jenis_surat.view', compact('model'));
    }
}

<?php

namespace App\Http\Controllers\Jabatan;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Models\Master\Divisi;
use App\Models\Role\RoleModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JabatanController extends BaseController
{
    public function index()
    {
        $title = 'Pengaturan Jabatan';

        return view('jabatan.jabatan.index', compact('title'));
    }

    public function create(Request $request)
    {
        $model = new Divisi();

        $role = RoleModel::where('is_delete', '0')->get();
        // dd($role);

        if ($request->isMethod('post')) {
            DB::beginTransaction();

            try {
                $model = new Divisi();

                $model->nama_divisi = $request->nama_divisi;
                $model->akses = $request->akses;
                $model->is_delete = 0;

                $model->save();

                DB::commit();

                return redirect('jabatan/jabatan/view/' . $model->id);
            } catch (\Exception $e) {
                DB::rollBack();
                return $e;
            }
        }

        return view('jabatan.jabatan.create', compact('model', 'role'));
    }

    public function update(Request $request)
    {
        $model = Divisi::query()->where(['id' => $request->id])->first();
        // dd($role);

        if ($request->isMethod('post')) {
            DB::beginTransaction();

            try {
                $model = Divisi::find($request->id)->first();

                $model->nama_divisi = $request->nama_divisi;
                $model->akses = $request->akses;
                $model->is_delete = 0;

                $model->save();

                DB::commit();

                return redirect('jabatan/jabatan/view/' . $model->id);
            } catch (\Exception $e) {
                DB::rollBack();
                return $e;
            }
        }

        return view('jabatan.jabatan.create', compact('model', 'role'));
    }

    public function view(Request $request)
    {
        $model = Divisi::query()->where(['id' => $request->id])->first();

        return view('jabatan.jabatan.view', compact('model'));
    }
}

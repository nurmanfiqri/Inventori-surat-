<?php

namespace App\Http\Controllers\Setting;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Models\Setting\FolderSurat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FolderSuratController extends BaseController
{
    public function index()
    {
        $title = 'Setting Folder Arsip Surat';

        return view('setting.folder_surat.index', compact('title'));
    }

    public function create(Request $request)
    {
        $model = new FolderSurat();
        // dd($model);
        if ($request->isMethod('post')) {
            DB::beginTransaction();

            try {
                $model = new FolderSurat();

                $model->folder_surat = $request->folder_surat;
                $model->is_delete = 0;

                $model->save();

                DB::commit();

                return redirect('setting/folder-surat/view/' . $model->id);
            } catch (\Exception $e) {
                Db::rollBack();
                return $e;
            }
        }

        return view('setting.folder_surat.create', compact('model'));
    }

    public function update(Request $request)
    {
        $model = FolderSurat::query()->where(['id' => $request->id])->first();

        if ($request->isMethod('post')) {
            DB::beginTransaction();

            try {
                $model = FolderSurat::find($request->id);

                $model->folder_surat = $request->folder_surat;
                $model->is_delete = 0;

                $model->save();

                DB::commit();
                return redirect('setting/folder-surat/view/' . $model->id);
            } catch (\Exception $e) {
                Db::rollBack();
                return $e;
            }
        }
        return view('setting.folder_surat.create', compact('model'));
    }

    public function view(Request $request, $id)
    {
        $model = FolderSurat::where(['id' => $id])->first();

        return view('setting.folder_surat.view', compact('model'));
    }
}

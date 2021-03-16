<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Master\MasterModel;

class MasterController extends Controller
{
    public function index()
    {
        return view('master.surat.index');
    }

    public function create(Request $request)
    {
        // dd($request->all());
        $model = new MasterModel();


        if ($request->isMethod('post')) {
            DB::beginTransaction();
            try {
                // dd($request->all());
                $model = new MasterModel();
                $model->nama = $request->nama;
                if ($request->file) {
                    $path = $request->file;
                    $file = $path;
                    $fileName = str_replace(' ', '_', $file->getClientOriginalName());
                    $save = $file->storeAs('public/file/', $fileName);
                    $pathGbr = 'public/file/' . $fileName;

                    $model->file = $fileName;
                } else {
                    $model->file = 'Tidak ada File';
                }
                $model->is_delete = 0;
                $model->url_file = $request->file ? $pathGbr : $model->url_file;
                $model->save();
                DB::commit();
                return redirect('master/surat')->with(['success' => 'Informasi baru berhasil disimpan']);
            } catch (\Exception $e) {
                DB::rollBack();
                return $e;
            }
        }
        return view('master.surat.create');
    }

    public function update(Request $request)
    {
        $model = MasterModel::query()->where(['id' => $request->id])->first();
        $title = 'Update Informasi';
        if ($request->isMethod('post')) {
            DB::beginTransaction();
            try {
                $model = MasterModel::find($request->id);
                $model->nama = $request->nama;
                if ($request->file) {
                    $path = $request->file;
                    $file = $path;
                    $fileName = str_replace(' ', '_', $file->getClientOriginalName());
                    $save = $file->storeAs('public/file/', $fileName);
                    $pathGbr = 'public/file/' . $fileName;

                    $model->file = $fileName;
                } else {
                    $model->file = $model->file;
                }
                $model->is_delete = 0;
                $model->url_file = $request->file ? $pathGbr : $model->url_file;
                $model->update();
                DB::commit();
                return redirect('master/surat')->with(['success' => 'Data Berhasil di Update']);
            } catch (\Exceptopn $e) {
                DB::rollBack();
                return $e;
            }
        }
        return view('master..surat.create', compact('title', 'model'));
    }

    public function delete($id)
    {
        $model = MasterModel::where(['id' => $id])->first();

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

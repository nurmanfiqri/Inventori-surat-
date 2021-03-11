<?php

namespace App\Http\Controllers\Role;

use App\Models\Role\RoleModel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class RoleController extends Controller
{
    public function index()
    {
        return view('role.index');
    }

    public function create(Request $request)
    {

        $model = new RoleModel();

        if ($request->isMethod('post')) {
            DB::beginTransaction();
            try {
                // dd($request->all());
                $model = new RoleModel();
                $model->role = $request->role;
                $model->is_delete = 0;
                $model->save();
                DB::commit();
                return redirect('role')->with(['success' => 'Informasi baru berhasil disimpan']);
            } catch (\Exception $e) {
                DB::rollBack();
                return $e;
            }
        }
        return view('role.createrole');
    }

    public function update(Request $request)
    {
        $model = RoleModel::query()->where(['id' => $request->id])->first();
        $title = 'Update Informasi';
        if ($request->isMethod('post')) {
            DB::beginTransaction();
            try {
                $model = RoleModel::find($request->id);
                $model->role = $request->role;

                $model->is_delete = 0;

                $model->update();
                DB::commit();
                return redirect('role')->with(['success' => 'Data Berhasil di Update']);
            } catch (\Exceptopn $e) {
                DB::rollBack();
                return $e;
            }
        }
        return view('role.createrole', compact('title', 'model'));
    }

    public function delete($id)
    {
        $model = RoleModel::where(['id' => $id])->first();

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

<?php

namespace App\Http\Controllers\Setting;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Models\Setting\User;
use Illuminate\Http\Request;

class UserController extends BaseController
{
    public function index()
    {
        $title = 'Setting User';
        return view('setting.user.index', compact('title'));
    }

    public function create(Request $request)
    {
        if ($request->isMethod('post')) {
            try {
                $model = new User();
                $model->id_karyawan = $request->karyawan;
                $model->id_role = $request->role;
                $model->is_delete = 0;
                $model->save();
            } catch (\Exception $e) {
                return response()->json([
                    'message' => 'error'.$e,
                ]);
            }
            return response()->json([
                'message' => 'Data berhasil disimpan',
            ]);
        }
    }

    public function update(Request $request, $id){
        $model = User::where(['id' => $id])->first();
        $model->id_karyawan = $request->karyawan;
        $model->id_role = $request->role;
        $model->is_delete = 0;
        $model->save();

        return response()->json([
            'message' => 'Data berhasil diupdate',
        ]);
    }

    public function editView(Request $request){
        $id = $request->id;

        $user = User::where(['id' => $id])->with('karyawan', 'role')->first();
        return response()->json($user);
    }

    public function delete($id){
        $model = User::where(['id' => $id])->first();
        $model->is_delete = 1;
        $model->save();

        return response()->json([
            'message' => 'Data berhasil dihapus'
        ]);

    }
}

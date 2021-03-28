<?php

namespace App\Http\Controllers\Role;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Models\Role\RoleAkses;
use Illuminate\Http\Request;
use DB;
use Role;

class RoleAksesController extends BaseController
{
    public function index(){
        $title = "Setting Role Akses User";
        return view('setting.roleAkses.index', compact('title'));
    }

    public function create(Request $request){
        $model = new RoleAkses();

        if($request->isMethod('post')){
            DB::beginTransaction();
            try{
                // dd($request->all());
                $model->id_karyawan = $request->id_karyawan;
                $model->id_role = $request->id_role;
                $model->is_delete = 0;
                
                $model->save();
                DB::commit();
                return redirect('setting/role-akses/view/'.$model->id)->with(['success' => 'Data berhasil ditambahkan']);
            } catch(\Exception $e){
                DB::rollBack();
                return $e;
            }
        }
        return view('setting.roleAkses.create', compact('model'));
    }

    public function view(Request $request, $id){
        $model = RoleAkses::where(['id' => $id])->with('karyawan', 'role')->first();

        return view('setting.roleAkses.view', compact('model'));
    }

    public function update(Request $request, $id){
        $model = RoleAkses::where(['id' => $id])->with('karyawan', 'role')->first();

        if($request->isMethod('post')){
            DB::beginTransaction();
            try{
                // dd($request->all());
                $model->id_karyawan = $request->id_karyawan;
                $model->id_role = $request->id_role;
                $model->is_delete = 0;
                
                $model->save();
                DB::commit();
                return redirect('setting/role-akses/view/'.$model->id)->with(['success' => 'Data berhasil ditambahkan']);
            } catch(\Exception $e){
                DB::rollBack();
                return $e;
            }
        }
        return view('setting.roleAkses.create', compact('model'));
    }

    public function delete($id){
        $model = RoleAkses::where(['id' => $id])->first();

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

<?php

namespace App\Http\Controllers\Role;

use App\Http\Controllers\BaseController;
use App\Models\Role\RoleModel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Session;
use App\Models\Menu\MenuModel;
use App\Models\Menu\MenuDetail;
use Illuminate\Support\Facades\Validator;

class RoleController extends BaseController
{
    public function index()
    {
        $title = "Setting Role";
        return view('setting.role.index', compact('title'));
    }

    public function create(Request $request)
    {
        $model = new RoleModel();

        $menu = MenuModel::where([
            ['parent', 0]
        ])
        ->get();

        if ($request->isMethod('post')) {
            DB::beginTransaction();
            try {
                // dd($request->all());
                $validator = Validator::make($request->all(),[
                    'role' => 'required|unique:role',
                ]);

                if($validator->fails()){
                    $error = $validator->message();
                }

                $model->role = strtolower($request->role);
                $model->is_delete = 0;
                $model->save();

                if(isset($request->menuDetail)){
                    $model->menuDetail = $request->menuDetail;
                    foreach($request->menuDetail as $r){
                        $Menu = new MenuDetail();
                        $Menu->id_menu = $r;
                        $Menu->id_role = $model->id;
                        $Menu->save();
                    }
                }

                if(isset($error)){
                    return view('setting.role.create', compact('model', 'menu'));
                }

                DB::commit();

                return redirect('setting/role/view/'.$model->id)->with(['success' => 'Role baru berhasil ditambahkan']);
            } catch (\Exception $e) {
                DB::rollBack();
                return $e;
            }
        }
        return view('setting.role.create', compact('model', 'menu'));
    }

    public function view(Request $request, $id){
        $model = RoleModel::where(['id' => $id])->first();

        $menu = MenuModel::where([
            'parent' => 0
        ])
        ->get();

        return view('setting.role.view', compact('model', 'menu'));
    }

    public function update(Request $request, $id)
    {
        $model = RoleModel::where(['id' => $id])->with('menu')->first();

        // dd($model);
        $menu = MenuModel::where([
            'parent' => 0
        ])
        ->get();
        
        if($request->isMethod('post')){
            DB::beginTransaction();
            try{
                $model->role = strtolower($request->role);
                $model->save();

                $delete = MenuDetail::where(['id_role' => $id])->delete();

                if(isset($request->menuDetail)){
                    foreach($request->menuDetail as $r){
                        $Menu = new MenuDetail();
                        $Menu->id_menu = $r;
                        $Menu->id_role = $model->id;

                        $Menu->save();
                    }
                }

                DB::commit();
                return redirect('setting/role/view/'.$model->id)->with(['success' => 'Data berhasil diupdate']);
            }catch(\Exception $e){
                DB::rollBack();
                return $e;
            }
        }
        return view('setting.role.create', compact('model', 'menu'));
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

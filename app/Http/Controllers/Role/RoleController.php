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
                $model = new RoleModel();
                $model->role = $request->role;
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
}

<?php

namespace App\Http\Controllers\Jabatan;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Models\Setting\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DepartmentController extends BaseController
{
    public function index()
    {
        $title = 'Pengaturan Bidang';

        return view('jabatan.department.index', compact('title'));
    }

    public function create(Request $request)
    {
        $model = new Department();

        if ($request->isMethod('post')) {
            DB::beginTransaction();

            try {
                $model = new Department();

                $model->department = $request->department;

                $model->singkatan = $request->singkatan;

                $model->is_delete = 0;

                $model->save();

                DB::commit();

                return redirect('jabatan/department/view/' . $model->id);
            } catch (\Exception $e) {
                DB::rollback();
                return $e;
            }
        }

        return view('jabatan.department.create', compact('model'));
    }

    public function update(Request $request)
    {
        $model = Department::query()->where(['id' => $request->id])->first();

        if ($request->isMethod('post')) {
            DB::beginTransaction();

            try {
                $model = Department::find($request->id)->first();

                $model->department = $request->department;

                $model->singkatan = $request->singkatan;

                $model->is_delete = 0;

                $model->save();

                DB::commit();

                return redirect('jabatan/department/view/' . $model->id);
            } catch (\Exception $e) {
                DB::rollback();
                return $e;
            }
        }

        return view('jabatan.department.create', compact('model'));
    }

    public function view(Request $request)
    {
        $model = Department::query()->where(['id' => $request->id])->first();

        return view('jabatan.department.view', compact('model'));
    }
}

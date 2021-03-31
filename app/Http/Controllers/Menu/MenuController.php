<?php

namespace App\Http\Controllers\Menu;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Menu\MenuModel;

class MenuController extends BaseController
{
    public function index()
    {
        return view('menu.index');
    }

    public function create(Request $request)
    {

        $model = new MenuModel();

        if ($request->isMethod('post')) {
            DB::beginTransaction();
            try {
                // dd($request->all());
                $model = new MenuModel();
                $model->menu = $request->menu;
                $model->url = $request->url;
                $model->is_delete = 0;
                $model->save();
                DB::commit();
                return redirect('menu')->->withSuccess('Success message');
            } catch (\Exception $e) {
                DB::rollBack();
                return $e;
            }
        }
        return view('menu.createmenu');
    }

    public function update(Request $request)
    {
        $model = MenuModel::query()->where(['id' => $request->id])->first();
        $title = 'Update Informasi';
        if ($request->isMethod('post')) {
            DB::beginTransaction();
            try {
                $model = MenuModel::find($request->id);
                $model->menu = $request->menu;
                $model->url = $request->url;
                $model->is_delete = 0;

                $model->update();
                DB::commit();
                return redirect('menu')->withSuccess('Success message');
            } catch (\Exceptopn $e) {
                DB::rollBack();
                return $e;
            }
        }
        return view('menu.createmenu', compact('title', 'model'));
    }

    public function delete($id)
    {
        $model = MenuModel::where(['id' => $id])->first();

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

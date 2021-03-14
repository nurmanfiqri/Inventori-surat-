<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Master\Karyawan;
use DB;

class KaryawanController extends Controller
{
    public function index(){
        $title = 'Master Data Karyawan';
        return view('master.karyawan.index');
    }

    public function view(Request $request){
        $title = "Detail Karyawan";
        $model = Karyawan::query()->where(['id' => $request->id])->first();
        return view('master.karyawan.view', compact('model', 'title'));
    }

    public function create(Request $request){
        $model = new Karyawan();

        if($request->isMethod('post')){
            // dd($request->all());
            DB::beginTransaction();
            try{
                $model->nama_karyawan = $request->nama;
                $model->id_divisi = $request->divisi;
                $model->id_jabatan = $request->jabatan;
                $model->is_delete = 0;

                $model->save();
                DB::commit();

                return redirect('master/karyawan/view/'.$model->id)->with(['success' => 'Data berhasil disimpan']);
            } catch(\Exception $e){
                DB::rollBack();
                return $e;
            }
        }
        return view('master.karyawan.create', compact('model'));
    }

    public function update(Request $request, $id){
        $model = Karyawan::query()->where(['id' => $id])->first();

        if($request->isMethod('post')){
            DB::beginTransaction();
            try{
                $model->nama_karyawan = $request->nama;
                $model->id_divisi = $request->divisi;
                $model->id_jabatan = $request->jabatan;

                $model->is_delete = 0;

                $model->save();

                DB::commit();

                return redirect('master/karyawan/view/'.$model->id)->with(['success' => 'Data berhasil di update']);
            } catch(\Exception $e){
                DB::rollBack();
                return $e;
            }
        }
        return view('master.karyawan.create', compact('model'));
    }

    public function delete($id){
        $model = Karyawan::where(['id' => $id])->first();

        if(empty($model)){
            abort(404);
        }

        DB::beginTransaction();
        try{
            $model->is_delete = 1;
            $model->save();

            DB::commit();

            return response()->json([
                'message' => 'Data berhasil dihapus',
            ]);
            
        }catch(\Exception $e){
            DB::rollBack();
            return $e;
        }
        
    }
}

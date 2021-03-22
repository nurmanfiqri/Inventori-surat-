<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Master\Divisi; 
use App\Models\Master\Jabatan; 
use DB;

class DivisiController extends BaseController
{
    public function index(){
        $title = 'Master Data Divisi';
        return view('master.divisi.index', compact('title'));
    }

    public function view(Request $request){
        $model = Divisi::query()->where(['id' => $request->id])->first();
        // dd($model);
        return view('master.divisi.view', compact('model'));
    }

    public function create(Request $request){
        $model = new Divisi();
        

        if($request->isMethod('post')){
            // dd($request->all());
            DB::beginTransaction();
            try{
                $model->nama_divisi = $request->nama_divisi;
                $model->is_delete = 0;
                $model->save();

                if($request->deletejabatan){
                    foreach($request->deleteJabatan as $r){
                        $data = Jabatan::whereIn('id', $request->id)->where('id_divisi', $model->id)->first();
                        $data->delete();
                    }
                }

                if(isset($request->jabatan)){
                    foreach($request->jabatan as $r){
                        $item = new Jabatan();
                        $item->nama_jabatan = $r['nama_jabatan'];
                        $item->line_no = $r['line_no'];
                        $item->is_delete = 0;
                        $item->id_divisi = $model->id;

                        $item->save();
                    }

                    DB::commit();
                    return redirect('master/divisi/view/'.$model->id)->with(['success' => 'Data berhasil disimpan']);
                }
            } catch(\Exception $e){
                DB::rollBack();
                return $e;
            }
        }
        return view('master.divisi.create', compact('model'));
    }

    public function update(Request $request, $id){
        $title = 'Update Divisi & Jabatan';
        $model = Divisi::query()->where(['id' => $id])->first();

        if($request->isMethod('post')){
            DB::beginTransaction();
            try{
                $model->nama_divisi = $request->nama_divisi;
                $model->is_delete = 0;
                $model->save();

                if($request->deletejabatan){
                    foreach($request->deleteJabatan as $r){
                        $data = Jabatan::whereIn('id', $request->id)->where('id_divisi', $model->id)->first();
                        $data->delete();
                    }
                }

                if(isset($request->jabatan)){
                    $request->jabatan = json_decode(json_encode($request->jabatan));
                    foreach($request->jabatan as $r){
                        // dd($request->all());
                        $item = empty($r->id) ? new Jabatan() : Jabatan::find($r->id);
                        $item->nama_jabatan = $r->nama_jabatan;
                        $item->line_no = $r->line_no;
                        $item->is_delete = 0;
                        $item->id_divisi = $model->id;

                        $item->save();
                    }
                    DB::commit();
                    return redirect('master/divisi/view/'.$model->id)->with(['success' => 'Data berhasil diupdate']);
                }
            }catch(\Exception $e){
                DB::rollBack();
                return $e;
            }
        }
        return view('master.divisi.create', compact('model'));
    }

    public function delete($id){
        $model = Divisi::where(['id' => $id])->first();

        if(empty($model)){
            abort(404);
        } 

        DB::beginTransaction();
        try{
            $model->is_delete = 1;
            $model->save();
            DB::commit();
        }catch(\Exception $e){
            DB::rollBack();
            return $e;
        }
        return response()->json([
            'message' => 'Data berhasil dihapus'
        ]);
    }
}

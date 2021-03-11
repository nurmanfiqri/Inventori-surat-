<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Master\Divisi; 
use App\Models\Master\Jabatan; 
use DB;

class DivisiController extends Controller
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
}

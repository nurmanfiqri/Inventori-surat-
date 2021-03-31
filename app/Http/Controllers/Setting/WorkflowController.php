<?php

namespace App\Http\Controllers\Setting;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Setting\Workflow;
use App\Models\Setting\Approver;

class WorkflowController extends BaseController
{
    public function index()
    {
        $title = 'Setting Approval';
        return view('setting.approval.index', compact('title'));
    }

    public function view(Request $request){
        $model = Workflow::query()->where(['id' => $request->id])->with('approver')->first();
        // dd($model->approver->nama_divisi);
        return view('setting.approval.view', compact('model'));
    }

    public function create(Request $request)
    {
        $model = new Workflow();

        if ($request->isMethod('post')) {
            DB::beginTransaction();
            try {
                // dd($request->all());
                $model->nama_workflow = $request->nama_workflow;
                $model->unit = 0;
                $model->is_delete = 0;
                $model->modul_id = 1; ///Sementara Masih surat masuk
                $model->kategori = 'masuk';

                $model->save();

                if($request->deleteApprover){
                    foreach($request->deleteApprover as $r){
                        $data = Approver::whereIn('id', $request->id)->where('id_workflow', $model->id)->first();
                        $data->delete();
                    }
                }

                if(isset($request->approver)){
                    $request->approver = json_decode(json_encode($request->approver));
                    foreach($request->approver as $r){
                        $item = new Approver();
                        $item->line_no = $r->line_no;
                        $item->id_divisi = $r->divisi;
                        $item->id_jabatan = $r->jabatan;
                        $item->id_workflow = $model->id;

                        $item->save();
                    }
                }

                DB::commit();
                return redirect('setting/workflow/view/'.$model->id)->withSuccess('Success message');
            } catch (\Exception $e) {
                DB::rollBack();
                return $e;
            }
        }
        return view('setting.approval.create', compact('model'));
    }

    public function update(Request $request){
        $model = Workflow::query()->where(['id' => $request->id])->first();

        if($request->isMethod('post')){
            DB::beginTransaction();
            try{
                // dd($request->all());
                $model->nama_workflow = $request->nama_workflow;
                $model->unit = 0;
                $model->is_delete = 0;
                $model->modul_id = 1; ///Sementara Masih surat masuk
                $model->kategori = 'masuk';

                $model->save();

                if($request->deleteApprover){
                    foreach($request->deleteApprover as $r){
                        $data = Approver::whereIn('id', $request->id)->where('id_workflow', $model->id)->first();
                        $data->delete();
                    }
                }

                if(isset($request->approver)){
                    $request->approver = json_decode(json_encode($request->approver));
                    foreach($request->approver as $r){
                        $item = empty($r->id) ? new Approver() : Approver::find($r->id);
                        $item->line_no = $r->line_no;
                        $item->id_divisi = $r->divisi;
                        $item->id_jabatan = $r->jabatan;
                        $item->id_workflow = $model->id;

                        $item->save();
                    }
                }
                DB::commit();
                return redirect('setting/workflow/view/'.$model->id)->withSuccess('Success message');
            }catch(\Exception $e){
                DB::rollBack();
                return $e;
            }
        }
        return view('setting.approval.create', compact('model'));
    }


    public function delete($id)
    {
        $model = Workflow::where(['id' => $id])->first();

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

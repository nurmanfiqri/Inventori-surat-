<?php

namespace App\Http\Controllers\Master;

use App\Helpers\UtilApproval;
use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Master\MasterModel;
use App\Models\Setting\FolderSurat;
use App\Models\Setting\JenisSurat;
use App\Models\Setting\PrioritasSurat;
use App\Models\Setting\SifatSurat;
use Illuminate\Support\Facades\Validator;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Storage;

class MasterController extends BaseController
{
    public function index()
    {
        return view('master.surat.index');
    }

    public function create(Request $request)
    {

        $model = new MasterModel();
        $jenis = JenisSurat::where('is_delete', '0')->get();
        $sifat = SifatSurat::where('is_delete', '0')->get();
        $prioritas = PrioritasSurat::where('is_delete', '0')->get();
        $folder = FolderSurat::where('is_delete', '0')->get();

        $user = $request->session()->get('user_id');
        if ($request->isMethod('post')) {
            // dd($request->all());
            DB::beginTransaction();
            try {

                $validator = Validator::make($request->all(), [
                    'file' => 'max:2000|mimes:pdf',
                    'image' => 'mimes:jpg, png, jpeg'
                ]);

                if ($validator->fails()) {
                    return redirect('master/surat/create')->with(['error' => 'Tipe File / Ukuran tidak sesuai']);
                }

                // dd($request->all());
                $model = new MasterModel();
                $model->nama = $request->nama;
                if ($request->file) {
                    $path = $request->file;
                    $file = $path;
                    $fileName = str_replace(' ', '_', $file->getClientOriginalName());
                    $fileName = 'Document_' . date('YmdHis') . '_' . $fileName;
                    $save = $file->storeAs('public/file/', $fileName);
                    $pathGbr = '/storage/file/' . $fileName;

                    $model->file = $fileName;
                } else {
                    $model->file = 'Tidak ada File';
                }
                $model->is_delete = 0;
                $model->doc_status = 'Draft';
                $model->unit = $request->unit;
                $model->id_user = $user;
                $model->tanggal = date('Y-m-d');
                $model->apv_level = 0;
                $model->url_file = $request->file ? $pathGbr : $model->url_file;
                $model->instansi = $request->instansi;
                $model->id_jenis_surat = $request->jenis_surat;
                $model->id_sifat_surat = $request->sifat_surat;
                $model->id_prioritas_surat = $request->prioritas_surat;
                $model->id_folder_surat = $request->folder_surat;
                $model->save();
                $submit = $this->submit($model->id);
                DB::commit();
                return redirect('master/surat/view/' . $model->id)->withSuccess('Success message');
            } catch (\Exception $e) {
                DB::rollBack();
                return $e;
            }
        }
        return view('master.surat.create', compact('jenis', 'sifat', 'prioritas', 'folder'));
    }

    public function update(Request $request)
    {
        $model = MasterModel::query()->where(['id' => $request->id])->first();

        $title = 'Update Informasi';
        if ($request->isMethod('post')) {
            DB::beginTransaction();
            try {
                $model = MasterModel::find($request->id);
                $model->nama = $request->nama;

                if ($request->file) {
                    $basePath = Storage::disk('local')->getDriver()->getAdapter()->getPathPrefix();
                    $path = $request->file;
                    // dd($basePath);
                    $pathOld = $basePath . 'public/file/' . $model->file;
                    // dd($pathOld);
                    unlink($pathOld);
                    $file = $path;
                    $fileName = str_replace(' ', '_', $file->getClientOriginalName());
                    $fileName = 'Document_' . date('YmdHis') . '_' . $fileName;
                    $save = $file->storeAs('public/file/', $fileName);

                    $pathGbr = '/storage/file/' . $fileName;

                    $model->file = $fileName;
                } else {
                    $model->file = $model->file;
                }
                $model->is_delete = 0;
                $model->doc_status = 'Draft';
                $model->apv_level = 0;
                $model->url_file = $request->file ? $pathGbr : $model->url_file;
                $model->id_jenis_surat = $request->jenis_surat;
                $model->id_sifat_surat = $request->sifat_surat;
                $model->id_prioritas_surat = $request->prioritas_surat;
                $model->id_folder_surat = $request->folder_surat;
                $model->update();
                DB::commit();
                return redirect('master/surat')->withSuccess('Success message');
            } catch (\Exception $e) {
                DB::rollBack();
                return $e;
            }
        }
        return view('master..surat.create', compact('title', 'model'));
    }

    public function view(Request $request, $id)
    {
        $model = MasterModel::where(['id' => $id])->first();
        // dd($model->id);

        return view('master.surat.view', compact('model'));
    }

    public function delete($id)
    {
        $model = MasterModel::where(['id' => $id])->first();

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

    public function submit($id)
    {
        $role = Session::get('role');
        $model = MasterModel::where(['id' => $id])->first();
        $approverList = UtilApproval::getApprover('Surat Masuk', $model, 'Surat Masuk');
        $approverLog = UtilApproval::approvalLog('Surat Masuk', $model, 'Submitted', 'Diteruskan Oleh ' . $role, 'Surat Masuk');

        if ($approverList) {
            $model->doc_status = 'Submitted';
            $model->save();

            return response()->json([
                'status' => 200,
                'message' => 'Document berhasil di Submit'
            ]);
        } else {
            return response()->json([
                'status' => 500,
                'message' => 'Mohon maaf terjadi kesalahan, silahkan coba beberapa saat nanti',
            ]);
        }
    }

    public function approve(Request $request, $id)
    {
        $model = MasterModel::where(['id' => $id])->first();
        $maxApprover = UtilApproval::getMaxApprover('Surat Masuk', $model, 'Surat Masuk');

        $role = Session::get('role');

        $level = $model->apv_level + 1;

        $docStatus = '';
        if ($level == $maxApprover) {
            $docStatus = 'Completed';
        } else {
            $docStatus = 'In Progress';
        }
        // dd($docStatus);
        $approverLog = UtilApproval::approvalLog('Surat Masuk', $model, $docStatus, 'Diteruskan Oleh ' . $role, 'Surat Masuk');

        $model->doc_status = $docStatus;
        $model->apv_level = $level;
        $model->save();

        return response()->json([
            'status' => 200,
            'message' => 'Document beerhasil di Approve',
        ]);
    }

    public function reject(Request $request, $id)
    {
        $keterangan = $request->keterangan;
        $model = MasterModel::where(['id' => $id])->first();
        $approver = UtilApproval::approvalLog('Surat Masuk', $model, 'Rejected', $keterangan, 'Surat Masuk');

        $model->doc_status = 'Rejected';
        $model->apv_level = -1;
        $model->save();

        return response()->json([
            'status' => 200,
            'message' => 'Document berhasil disimpan'
        ]);
    }

    public function download($id)
    {
        $model = MasterModel::query()->where(['id' => $id])->first();

        $role = Session::get('role');

        $approver = UtilApproval::approvalLog('Surat Masuk', $model, 'Downloaded', 'File di Diunduh Oleh  ' . $role, 'Surat Masuk');

        return Storage::download($model->url_file, $model->file);
    }
}

<?php

namespace App\Helpers;

use App\Models\Setting\ApproverList;
use App\Models\Setting\ApproverLog;
use Illuminate\Contracts\Session\Session as SessionSession;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class UtilApproval
{
    public static function getApprover($document, $data, $kategori = null){
        $workflow = DB::select("select * from setting_modul a join setting_workflow b on a.id = b.modul_id order by b.id");

        $kode = Session::get('id_role');

        $workflow_id = null;
        if(isset($workflow)){
            foreach($workflow as $r){
                $isMatch = true;
                if((isset($r->unit) && $r->unit != 0 && $kode != $r->unit)){
                    $isMatch = false;
                }

                if((isset($r->kategori) && $kategori != $r->kategori)){
                    $isMatch = false;
                }

                if($isMatch){
                    $workflow_id = $r->id;
                    break;
                }
            }
        }

        $approver = DB::select("select * from setting_workflow_d where id_workflow = '$workflow_id' order by line_no");

        // dd($approver);
        if(isset($approver)){
            $no = 1;
            foreach($approver as $r){
                $user = DB::select(
                    "select * from karyawan where id_jabatan = '$r->id_jabatan' and id_divisi = '$r->id_divisi'"
                );

                // dd($user);
                if(empty($user)){
                    $user = DB::select(
                        "select * from karyawan where id_jabatan = '$r->id_jabatan'"
                    );

                    if (empty($user)) continue;
                }

                $apvList = new ApproverList();
                $apvList->document = $document;
                $apvList->document_id = $data->id;
                $apvList->apv_level = $no;
                $apvList->user_id = $user[0]->id;
                $apvList->kategori = $kategori;
                $apvList->tanggal = date('Y-m-d');
                $apvList->id_jabatan = $user[0]->id_jabatan;
                $apvList->id_divisi = $user[0]->id_divisi;
                $no++;

                $apvList->save();
            }
            if($no == 1){
                return false;
            } else {
                return true;
            }
            return true;
        }
        return false;
    }

    public static function getMaxApprover($document, $data, $kategori = null){
        $approver = DB::select("select * from approver_list where document = '$document' and document_id = '$data->id' and kategori = '$kategori'");

        return count($approver);
    }

    public static function approvalLog($document, $data, $doc_status, $keterangan = null, $kategori = null){
        $user_id = Session::get('id_karyawan');
        $divisi = Session::get('id_divisi');
        $jabatan = Session::get('id_jabatan');

        $log = new ApproverLog();
        $log->document = $document;
        $log->document_id = $data->id;
        $log->user_id = $user_id;
        $log->status = $doc_status;
        $log->tanggal = date('Y-m-d');
        $log->keterangan = $keterangan;
        $log->id_divisi = $divisi;
        $log->id_jabatan = $jabatan;

        $log->save();

        if($doc_status == 'Rejected'){
            $approver = ApproverList::where(['document_id' => $data->id, 'document' => $document, 'kategori' => $kategori])->delete();
        } else if($doc_status == 'Completed' || $doc_status == 'In Progress'){
            $approver = ApproverList::where([
                'document_id' => $data->id,
                'document' => $document,
                'user_id' => $user_id,
                'kategori' => $kategori,
            ])->first();

            if(isset($approver)){
                $approver->status = 'Approve';
                $approver->save();
            }
        }
        return true;
    }

    public static function getUserApprover($document, $id, $level = 0, $kategori = null)
    {
        $approver = DB::select("select * from approver_list where document = '$document' and document_id = '$id' and apv_level = ($level + 1) and kategori = '$kategori' limit 1");

        return isset($approver[0]) ? $approver[0]->user_id : null;
    }

    public static function approvalVisibility($datatable, $document)
    {
        $datatable = $datatable
            ->addColumn('aksi', function ($data) use ($document) {
                $approver = UtilApproval::getUserApprover($document, $data->id, $data->apv_level, $document);
                // dd($approver);
                $role = Session::get('role');

                $button = '';
                if ($data->doc_status == 'Draft' || $data->doc_status == 'Rejected') {
                    if ($role == 'user' || $role == 'super admin') {
                        $button .= '<a href="' . url("master/surat/update/" . $data->id) . '" title = "Edit" data-id="' . $data->id . '" class="btn btn-primary btn-sm"> <i class="fas fa-edit"></i></a>';

                        $button .= '&nbsp';
                        $button .= '<button type="button" title="Hapus" data-id="' . $data->id . '" onclick="hapus(' . $data->id . ')" class="btn btn-warning btn-sm"> 
                            <i class="fas fa-fw fa-trash"></i>
                        </button>';

                        $button .= '&nbsp';
                        $button .= '<a href="' . url("master/surat/view/" . $data->id) . '" title = "Detail" data-id="' . $data->id . '" class="btn btn-info btn-sm"> <i class="fas fa-search"></i> </a>';
                    } else if ($role == 'admin') {
                    }

                    if ($data->apv_level != -1) {
                        $button .= '&nbsp';
                        $button .= '<button type="button" title="Submit" data-id="' . $data->id . '" onclick="submit(' . $data->id . ')" class="btn btn-success btn-sm"> 
                            <i class="fas fa-fw fa-file-upload"></i>
                        </button>';
                    }
                } else if (($data->doc_status == 'Submitted' || $data->doc_status == 'In Progress') && $approver != null && $approver == Session::get('id_karyawan')) {
                    $button .= '&nbsp';
                    $button .= '<button type="button" title="Approve" data-id="' . $data->id . '" onclick="approve(' . $data->id . ')" class="btn btn-success btn-sm"> 
                        <i class="fas fa-fw fa-check"></i>
                    </button>';

                    $button .= '&nbsp';
                    $button .= '<button type="button" title="Reject" data-id="' . $data->id . '" onclick="reject(' . $data->id . ')" class="btn btn-danger btn-sm"> 
                        <i class="fas fa-fw fa-times"></i>
                    </button>';
                }
                $button .= '&nbsp';
                $button .= '<button type="button" title="Log Approver" data-id="' . $data->id . '" onclick="approver(' . $data->id . ')" class="btn btn-primary btn-sm"> 
                    <i class="fas fa-fw fa-list"></i>
                </button>';

                $button .= '&nbsp';
                $button .= '<button type="button" title="Log Document" data-id="' . $data->id . '" onclick="approverlog(' . $data->id . ')" class="btn btn-info btn-sm"> 
                    <i class="fas fa-fw fa-history"></i>
                </button>';

                return $button;
            })
            ->rawColumns(['aksi']);
        return $datatable;
    }
}

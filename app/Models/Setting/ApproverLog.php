<?php

namespace App\Models\Setting;

use Illuminate\Database\Eloquent\Model;

class ApproverLog extends Model
{
    protected $table = 'approver_log';
    public $timestamp = false;


    public function profile(){
        return $this->hasOne('App\Models\Master\Karyawan', 'id', 'user_id');
    }

    public function divisi(){
        return $this->hasOne('App\Models\Master\Divisi', 'id', 'id_divisi');
    }

    public function jabatan(){
        return $this->hasOne('App\Models\Master\Jabatan', 'id', 'id_jabatan');
    }
}

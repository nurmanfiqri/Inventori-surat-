<?php

namespace App\Models\Setting;

use Illuminate\Database\Eloquent\Model;

class Approver extends Model
{
    protected $table = 'setting_workflow_d';
    public $timestamps = false;

    public function jabatan(){
        return $this->hasOne('App\Models\Master\Jabatan', 'id', 'id_jabatan');
    }

    public function divisi(){
        return $this->hasOne('App\Models\Master\Divisi', 'id', 'id_divisi');
    }
}

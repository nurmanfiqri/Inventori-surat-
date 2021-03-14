<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    protected $table = 'karyawan';
    public $timestamp = false;

    public function jabatan(){
        return $this->hasOne('App\Models\Master\Jabatan', 'id', 'id_jabatan');
    }

    public function divisi(){
        return $this->hasOne('App\Models\Master\Divisi', 'id', 'id_divisi');
    }
}

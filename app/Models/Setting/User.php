<?php

namespace App\Models\Setting;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'setting_role';
    public $timestamps = false;

    public function karyawan(){
        return $this->hasOne('App\Models\Master\Karyawan', 'id', 'id_karyawan');
    }

    public function role(){
        return $this->hasOne('App\Models\Role\RoleModel', 'id', 'id_role');
    }
}
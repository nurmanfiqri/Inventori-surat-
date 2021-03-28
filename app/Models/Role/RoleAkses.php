<?php

namespace App\Models\Role;

use Illuminate\Database\Eloquent\Model;

class RoleAkses extends Model
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

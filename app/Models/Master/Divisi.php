<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Model;

class Divisi extends Model
{
    protected $table = 'divisi_h';
    public $timestamps = false;

    public function jabatan()
    {
        return $this->hasMany('App\Models\Master\Jabatan', 'id_divisi', 'id');
    }

    public function AksesRole()
    {
        return $this->hasOne('App\Models\Role\RoleModel', 'id', 'akses');
    }
}

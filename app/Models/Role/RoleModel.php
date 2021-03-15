<?php

namespace App\Models\Role;

use Illuminate\Database\Eloquent\Model;
use DB;

class RoleModel extends Model
{
    protected $table = 'role';
    public $timestamps = false;

    public function menu(){
        return $this->hasMany('App\Models\Menu\MenuDetail', 'id_role', 'id');
    }

    public function namaRole(){
        return $this->hasOne('App\Models\Role\RoleModel', 'id', 'role');
    }
}

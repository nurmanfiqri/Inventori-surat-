<?php

namespace App\Models\Menu;

use Illuminate\Database\Eloquent\Model;

class MenuDetail extends Model
{
    protected $table = 'menu_d';
    public $timestamps = false;

    public function detailMenu(){
        return $this->hasOne('App\Models\Menu\MenuModel', 'id', 'id_menu');
    }

    public function namaRole(){
        return $this->hasOne('App\Models\Role\RoleModel', 'id', 'id_role');
    }

}

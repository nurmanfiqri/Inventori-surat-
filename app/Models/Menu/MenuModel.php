<?php

namespace App\Models\Menu;

use Illuminate\Database\Eloquent\Model;

class MenuModel extends Model
{
    protected $table = 'menu_h';
    public $timestamps = false;

    public function sub_menu2(){
        return $this->hasMany('App\Models\Menu\MenuModel', 'parent', 'id')->orderBy('sort_by', 'asc');
    }
}

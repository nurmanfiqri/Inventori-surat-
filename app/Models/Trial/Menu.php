<?php

namespace App\Models\Trial;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = 'menu';

    public function sub_menu2(){
        return $this->hasMany('App\Models\Trial\Menu', 'parent', 'id')->orderBy('sort_by');
    }        
}

<?php

namespace App\Models\Trial;

use Illuminate\Database\Eloquent\Model;

class MenuDetail extends Model
{
    protected $table = 'menu_detail';

    public function detailMenu(){
        return $this->hasOne('App\Models\Trial\Menu', 'id', 'id_menu');
    }
}

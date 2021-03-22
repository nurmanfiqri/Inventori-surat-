<?php

namespace App\Http\Controllers;

use App\Models\Menu\MenuModel;
use App\Models\Trial\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;


class BaseController extends Controller
{
    public function __construct()
    {
        $role_id = Session::get('id_role');
        // dd($role_id);
            $menu = MenuModel::where(['parent' => '0'])
                ->with(['sub_menu2' => function($q) use ($role_id){
                $q->join('menu_d as a', 'id', '=', 'a.id_menu')->where('a.id_role', $role_id)->orderBy('sort_by', 'asc');
                }])
                ->join('menu_d as a', 'menu_h.id', '=', 'a.id_menu')
                ->where([
                    'a.id_role' => $role_id,
                ])->orderBy('sort_by', 'asc')
                ->get();
  
        View::share('menuList', $menu);
    }
}

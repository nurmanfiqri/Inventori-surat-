<?php

namespace App\Models\Role;

use Illuminate\Database\Eloquent\Model;
use DB;

class RoleModel extends Model
{
    protected $table = 'user_role';
    public $timestamps = false;
}

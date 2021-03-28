<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Model;

class MasterModel extends Model
{
    protected $table = 'master';
    // public $timestamps = false;

    public function approver(){
        return $this->hasOne('App\Models\Setting\Approver', 'id', 'unit');
    }

    public function workflow(){
        return $this->hasOne('App\Models\Setting\Workflow', 'id', 'unit');
    }
}

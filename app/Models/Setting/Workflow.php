<?php

namespace App\Models\Setting;

use Illuminate\Database\Eloquent\Model;

class Workflow extends Model
{
    protected $table = 'setting_workflow';
    public $timestamps = false;

    public function approver(){
        return $this->hasMany('App\Models\Setting\Approver', 'id_workflow', 'id');
    }
}

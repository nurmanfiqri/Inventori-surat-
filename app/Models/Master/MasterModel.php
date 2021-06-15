<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Model;

class MasterModel extends Model
{
    protected $table = 'master';
    // public $timestamps = false;

    public function approver()
    {
        return $this->hasOne('App\Models\Setting\Approver', 'id', 'unit');
    }

    public function workflow()
    {
        return $this->hasOne('App\Models\Setting\Workflow', 'id', 'unit');
    }

    public function jenis_surat()
    {
        return $this->hasOne('App\Models\Setting\JenisSurat', 'id', 'id_jenis_surat');
    }

    public function sifat_surat()
    {
        return $this->hasOne('App\Models\Setting\SifatSurat', 'id', 'id_sifat_surat');
    }

    public function prioritas_surat()
    {
        return $this->hasOne('App\Models\Setting\PrioritasSurat', 'id', 'id_prioritas_surat');
    }
}

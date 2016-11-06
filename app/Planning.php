<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Planning extends Model
{
    protected $table = 'planning';

    protected $fillable = ['id_user','id_company','id_medico','id_patients','id_equipment','datestart',
    'timestart','dateend','timeend','status'];
    
    public $timestamps = true;
}

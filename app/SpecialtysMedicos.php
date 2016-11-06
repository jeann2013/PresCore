<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SpecialtysMedicos extends Model
{
    protected $table = 'specialtys_medicos';

    protected $fillable = [
        'id_medico', 'id_specialty'
    ];

     public $timestamps = true;
}

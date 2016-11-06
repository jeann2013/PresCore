<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medicos extends Model
{
    
    protected $table = 'medicos';

    protected $fillable = [
        'firtsname','lastname', 'id_user', 'id_company','url','address'
    ];
    
    public $timestamps = true;
}

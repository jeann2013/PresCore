<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Specialtys extends Model
{
    
    protected $table = 'specialtys';

    protected $fillable = [
        'name', 'id_user', 'id_company'
    ];

     public $timestamps = true;
}

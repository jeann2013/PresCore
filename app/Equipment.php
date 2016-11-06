<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    protected $table = 'equipment';

    protected $fillable = [
        'description','brand', 'model', 'timeadd','cost','id_user','id_company','status'
    ];
    
    public $timestamps = true;
}

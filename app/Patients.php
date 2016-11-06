<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patients extends Model
{
    protected $table = 'patients';

    protected $fillable = ['firtsname','lastname','iddocument','address','phone','cell_phone','id_user','id_company','status'];

    public $timestamps = true;
    
}

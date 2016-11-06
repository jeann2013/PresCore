<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Access extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'access';
    protected $fillable = [
        'id_user', 'id_module','id_company','views','inserts','modifys','deletes'
    ];

     public $timestamps = true;

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password'
    ];

}

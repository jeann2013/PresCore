<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'description', 'order', 'id_father','url','status','visible'
    ];

    public $timestamps = true;


    public function accesos($userid,$url) {
        
        $select = \DB::table('modules')
        ->select('access.views', 
            'access.inserts', 
            'access.modifys', 
            'access.deletes')
        ->join('access', function($join){
              $join->on('access.id_module', '=', 'modules.id');
        });

        $select->where('access.id_user', '=',$userid)->where('modules.url', '=',$url);

        
        $data= $select->orderBy('modules.id', 'asc')->get();

        return $data;
    }
}

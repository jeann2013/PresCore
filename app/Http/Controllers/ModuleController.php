<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Module;
use App\User;
use App\Access;


class ModuleController extends Controller
{
    public function save(Request $request)
    {
        $user = $request->session()->get('user');
        $iduser = $request->session()->get('id');

        if($user=="" && $iduser==""){
            return view('login.login');
        }

    	$modules = new Module;
        
    
    	$modules->description = $request->description;
    	$modules->order = $request->order;
    	$modules->id_father = $request->id_father;
    	$modules->url = $request->url;
    	$modules->visible = $request->visible;
        $modules->status = 1;
    	$modules->save();

        $users = User::all();    
        foreach ($users as $user ) {
            
            $access = new Access; 
            $access->id_user=$user->id;
            $access->id_module=$modules->id;
            $access->id_company=$user->id_company;
            $access->views=1;
            $access->inserts=0;
            $access->modifys=0;
            $access->deletes=0;
            $access->save();    
            
        }

        $request->session()->put('notify', '1');
        return redirect('module');

    }

    public function update(Request $request)
    {
        $user = $request->session()->get('user');
        $iduser = $request->session()->get('id');

        if($user=="" && $iduser==""){
            return view('login.login');
        }

        $modules = Module::find($request->id);

        $modules->description = $request->description;
    	$modules->order = $request->order;
    	$modules->id_father = $request->id_father;
    	$modules->url = $request->url;
    	$modules->visible = $request->visible;
        $modules->status = $request->status;
        $modules->updated_at=date('Y-m-d H:i:s');
    	$modules->save();
    	
        $request->session()->put('notify', '2');
        return redirect('module');

    }

    public function delete(Request $request)
    {
        $user = $request->session()->get('user');
        $iduser = $request->session()->get('id');

        if($user=="" && $iduser==""){
            return view('login.login');
        }
        
        $modules = Module::find($request->id);;

        $modules->delete();

    	$request->session()->put('notify', '3');
        return redirect('module');

    }

}

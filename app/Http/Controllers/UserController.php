<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User;
use App\Access;
use App\Module;


class UserController extends Controller
{
    public function save(Request $request)
    {

        $user = $request->session()->get('user');
        $iduser = $request->session()->get('id');

        if($user=="" && $iduser==""){
            return view('login.login');
        }

    	$users = new User;
        $access = new Access;        
        $modules = Module::all();

    	$users->firtsname = $request->firtsname;
    	$users->lastname = $request->lastname;
    	$users->user = $request->user;
    	$users->id_company = $request->id_company;
    	$users->password = md5('secret');
    	$users->save();

        $count_module = $request->count_mod;

        foreach ($modules as $module)
        {
            $access = new Access;    

            $view='view'.$module->id;
            $view_value = $request->$view;
            if($view_value==""){$view_value="0";}
            
            $save='save'.$module->id;
            $save_value = $request->$save;
            if($save_value==""){$save_value="0";}
            
            $modify='modify'.$module->id;
            $modify_value = $request->$modify;
            if($modify_value==""){$modify_value="0";}
            
            $delete='delete'.$module->id;
            $delete_value = $request->$delete;
            if($delete_value==""){$delete_value="0";}

            if($view_value<>"" || $save_value<>"" || $modify_value<>"" || $delete_value<>""){
                $access->id_user=$users->id;
                $access->id_module=$module->id;
                $access->id_company=$request->id_company;
                $access->views=$view_value;
                $access->inserts=$save_value;
                $access->modifys=$modify_value;
                $access->deletes=$delete_value;
                $access->save();
            }
        }    

        $request->session()->put('notify', '1');
        
    	return redirect('user');
    }

    public function update(Request $request)
    {
        $user = $request->session()->get('user');
        $iduser = $request->session()->get('id');

        if($user=="" && $iduser==""){
            return view('login.login');
        }

        $modules = Module::all();

    	$users = User::find($request->id);
    	$users->firtsname = $request->firtsname;
    	$users->lastname = $request->lastname;
    	$users->user = $request->user;
    	$users->id_company = $request->id_company;
        $users->updated_at=date('Y-m-d H:i:s');
    	$users->save();

        foreach ($modules as $module)
        {
            $view='view'.$module->id;
            $view_value = $request->$view;
            if($view_value==""){$view_value="0";}
            
            $save='save'.$module->id;
            $save_value = $request->$save;
            if($save_value==""){$save_value="0";}
            
            $modify='modify'.$module->id;
            $modify_value = $request->$modify;
            if($modify_value==""){$modify_value="0";}
            
            $delete='delete'.$module->id;
            $delete_value = $request->$delete;
            if($delete_value==""){$delete_value="0";}

            $access_module = \DB::table('access')->where('access.id_module', '=',$module->id)->count();

            if($access_module>0){
            if($view_value<>"" || $save_value<>"" || $modify_value<>"" || $delete_value<>""){
               
                $var_datetime = date('Y-m-d H:s:i');
                $access = \DB::update("update access set id_company=".$request->id_company.",
                views =".$view_value.",inserts=".$save_value.",modifys=".$modify_value.",
                deletes=".$delete_value.",updated_at = '".$var_datetime."' 
                where id_module = ".$module->id." and id_user = ".$request->id);

            }}else{

                $access = new Access; 
                $access->id_user=$request->id;
                $access->id_module=$module->id;
                $access->id_company=$request->id_company;
                $access->views=0;
                $access->inserts=0;
                $access->modifys=0;
                $access->deletes=0;
                $access->save();  

            }
        }
        
        $request->session()->put('notify', '2');
        
    	return redirect('user');
    }

    public function delete(Request $request)
    {
        $user = $request->session()->get('user');
        $iduser = $request->session()->get('id');

        if($user=="" && $iduser==""){
            return redirect('login');
        }

        $users = User::find($request->id);

        $users->status=0;

        $user->save();

        $request->session()->put('notify', '3');

    	return redirect('user');

    }

    public function login(Request $request)
    {
        $pass = md5($request->password);
        $users = \DB::table('users')->where('user','=' ,$request->user)->where('password','=' ,$pass)->get();
        foreach ($users as $user)
        {
            $id = $user->id;
            $user = $user->user;
        }

        if(isset($id) && $id <> ""){

            $request->session()->put('id', $id);
            $request->session()->put('user', $user);
            return redirect('dashboard');

        }else{

            $users=0;
            return view('login.login',compact('users'));
        }

    }

    public function logout(Request $request)
    {
        $request->session()->forget('user');
        $request->session()->forget('id');
        return redirect('login');
    }

    public function change(Request $request)
    {
        $user = $request->session()->get('user');
        $iduser = $request->session()->get('id');

        if($user=="" && $iduser==""){
            return view('login.login');
        }

        $users = User::find($iduser);
        $users->updated_at=date('Y-m-d H:i:s');
        $users->password=md5($request->password2);
        $users->save();

        $changes = array('change'=>1);
        return view('change.change',compact('changes'));
        //return redirect('change','changes');
    }

}

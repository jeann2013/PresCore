<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Specialtys;

class SpecialtysController extends Controller
{
    public function save(Request $request)
    {
        $user = $request->session()->get('user');
        $iduser = $request->session()->get('id');

        if($user=="" && $iduser==""){
            return view('login.login');
        }

    	$specialtys = new Specialtys;

    	$specialtys->name = $request->name;
    	$specialtys->id_company = $request->id_company;
    	$specialtys->id_user = $iduser;
        $specialtys->status = 1;
    	$specialtys->save();

        $request->session()->put('notify', '1');

    	return redirect('specialtys');

    }

    public function update(Request $request)
    {
        $user = $request->session()->get('user');
        $iduser = $request->session()->get('id');

        if($user=="" && $iduser==""){
            return view('login.login');
        }

        $specialtys = Specialtys::find($request->id);

        $specialtys->name = $request->name;
    	$specialtys->id_company = $request->id_company;
    	$specialtys->id_user = $iduser;
        $specialtys->status = $request->status;
        $specialtys->updated_at=date('Y-m-d H:i:s');
    	$specialtys->save();

        $request->session()->put('notify', '2');

    	return redirect('specialtys');

    }

    public function delete(Request $request)
    {
        $user = $request->session()->get('user');
        $iduser = $request->session()->get('id');

        if($user=="" && $iduser==""){
            return view('login.login');
        }
        
        $specialtys = Specialtys::find($request->id);;

        $specialtys->delete();

        $request->session()->put('notify', '3');

    	return redirect('specialtys');

    }


}

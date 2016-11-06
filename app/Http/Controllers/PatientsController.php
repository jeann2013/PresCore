<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Patients;

class PatientsController extends Controller
{
    public function save(Request $request)
    {
        $user = $request->session()->get('user');
        $iduser = $request->session()->get('id');

        if($user=="" && $iduser==""){
            return view('login.login');
        }

    	$patients = new Patients;
    	$patients->firtsname = $request->firtsname;
    	$patients->lastname = $request->lastname;
    	$patients->iddocument = $request->iddocument;
    	$patients->address = $request->address;
    	$patients->phone = $request->phone;
    	$patients->cell_phone = $request->cell_phone;    	
    	$patients->id_user = $iduser;
    	$patients->id_company = $request->id_company;
    	$patients->status = 1;
    	$patients->save();
        $request->session()->put('notify', '1');
    	return redirect('patients');

    }

    public function update(Request $request)
    {
        $user = $request->session()->get('user');
        $iduser = $request->session()->get('id');

        if($user=="" && $iduser==""){
            return view('login.login');
        }

        $patients = Patients::find($request->id);

        $patients->firtsname = $request->firtsname;
    	$patients->lastname = $request->lastname;
    	$patients->iddocument = $request->iddocument;
    	$patients->address = $request->address;
    	$patients->phone = $request->phone;
    	$patients->cell_phone = $request->cell_phone;    	
    	$patients->id_user = $iduser;
    	$patients->id_company = $request->id_company;
    	$patients->status = 1;
    	$patients->updated_at=date('Y-m-d H:i:s');
    	$patients->save();
    	
        $request->session()->put('notify', '2');
    	
    	return redirect('patients');

    }

    public function delete(Request $request)
    {
        $user = $request->session()->get('user');
        $iduser = $request->session()->get('id');

        if($user=="" && $iduser==""){
            return view('login.login');
        }
        
        $patients = Patients::find($request->id);;
        $patients->delete();

        $request->session()->put('notify', '3');
    	return redirect('patients');

    }


}

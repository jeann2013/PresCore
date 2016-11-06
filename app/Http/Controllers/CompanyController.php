<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Company;

class CompanyController extends Controller
{
    public function save(Request $request)
    {
        $user = $request->session()->get('user');
        $iduser = $request->session()->get('id');

        if($user=="" && $iduser==""){
            return view('login.login');
        }

    	$companys = new Company;

    	$companys->name = $request->name;
    	$companys->ruc = $request->ruc;
    	$companys->phone = $request->phone;
    	$companys->address = $request->address;
    	$companys->save();

        $request->session()->put('notify', '1');

    	return redirect('company');

    }

    public function update(Request $request)
    {
        $user = $request->session()->get('user');
        $iduser = $request->session()->get('id');

        if($user=="" && $iduser==""){
            return view('login.login');
        }

        $companys = Company::find($request->id);

        $companys->name = $request->name;
    	$companys->ruc = $request->ruc;
    	$companys->phone = $request->phone;
    	$companys->address = $request->address;
        $companys->updated_at=date('Y-m-d H:i:s');
    	$companys->save();

        $request->session()->put('notify', '2');

    	return redirect('company');

    }

    public function delete(Request $request)
    {
        $user = $request->session()->get('user');
        $iduser = $request->session()->get('id');

        if($user=="" && $iduser==""){
            return view('login.login');
        }
        
        $companys = Company::find($request->id);;

        $companys->delete();

        $request->session()->put('notify', '3');

    	return redirect('company');

    }


}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Medicos;
use App\SpecialtysMedicos;

class MedicosController extends Controller
{
    public function save(Request $request)
    {
        $user = $request->session()->get('user');
        $iduser = $request->session()->get('id');

        if($user=="" && $iduser==""){
            return view('login.login');
        }

    	$medicos = new Medicos;
    	$specialtysmedicos = new SpecialtysMedicos;

    	$medicos->firtsname = $request->fname;
    	$medicos->lastname = $request->lname;
    	$medicos->id_company = $request->id_company;
    	$medicos->id_user = $iduser;
    	$medicos->phone = $request->phone;
    	$medicos->cellphone = $request->cellphone;
    	$medicos->address = $request->address;
        $medicos->status = 1;
    	$medicos->save();

    	$specialtysmedicos->id_medico=$medicos->id;
    	$specialtysmedicos->id_specialty=$request->id_specialtys;
    	$specialtysmedicos->save();

        $request->session()->put('notify', '1');

    	return redirect('medicos');

    }

    public function update(Request $request)
    {
        $user = $request->session()->get('user');
        $iduser = $request->session()->get('id');

        if($user=="" && $iduser==""){
            return view('login.login');
        }

        $medicos = Medicos::find($request->id);

       	$medicos->firtsname = $request->fname;
    	$medicos->lastname = $request->lname;
    	$medicos->id_company = $request->id_company;
    	$medicos->id_user = $iduser;
    	$medicos->phone = $request->phone;
    	$medicos->cellphone = $request->cellphone;
    	$medicos->address = $request->address;
        $medicos->status = $request->status;
        $medicos->updated_at=date('Y-m-d H:i:s');
    	$medicos->save();

    	$idspecialtysmedicos = SpecialtysMedicos::find($request->idspecialtys_medicos);
    	$idspecialtysmedicos->id_medico = $request->id;
    	$idspecialtysmedicos->id_specialty = $request->id_specialtys;
    	$idspecialtysmedicos->updated_at=date('Y-m-d H:i:s');
    	$idspecialtysmedicos->save();

        $request->session()->put('notify', '2');

    	return redirect('medicos');

    }

    public function delete(Request $request)
    {
        $user = $request->session()->get('user');
        $iduser = $request->session()->get('id');

        if($user=="" && $iduser==""){
            return view('login.login');
        }

        $medicos = Medicos::find($request->id);
		$medicos->delete();

        $idspecialtysmedicos = SpecialtysMedicos::find($request->idspecialtys_medicos);
        $idspecialtysmedicos->delete();

        $request->session()->put('notify', '3');

    	return redirect('medicos');

    }

}


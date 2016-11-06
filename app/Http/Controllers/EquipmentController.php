<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Equipment;

class EquipmentController extends Controller
{
    public function save(Request $request)
    {
        $user = $request->session()->get('user');
        $iduser = $request->session()->get('id');

        if($user=="" && $iduser==""){
            return view('login.login');
        }

    	$equipment = new Equipment;

    	$equipment->description = $request->description;
    	$equipment->brand = $request->brand;
    	$equipment->model = $request->model;
    	$equipment->timeadd = $request->timeadd;
    	$equipment->cost = $request->cost;
    	$equipment->id_user = $iduser;
    	$equipment->id_company = $request->id_company;
    	$equipment->status = 1;
    	$equipment->save();

        $request->session()->put('notify', '1');
    	return redirect('equipment');

    }

    public function update(Request $request)
    {
        $user = $request->session()->get('user');
        $iduser = $request->session()->get('id');

        if($user=="" && $iduser==""){
            return view('login.login');
        }

        $equipment = Equipment::find($request->id);

        $equipment->description = $request->description;
    	$equipment->brand = $request->brand;
    	$equipment->model = $request->model;
    	$equipment->timeadd = $request->timeadd;
    	$equipment->cost = $request->cost;
    	$equipment->id_user = $iduser;
    	$equipment->id_company = $request->id_company;
    	$equipment->updated_at=date('Y-m-d H:i:s');
    	$equipment->status = $request->status;
    	$equipment->save();

        $request->session()->put('notify', '2');
    	return redirect('equipment');

    }

    public function delete(Request $request)
    {
        $user = $request->session()->get('user');
        $iduser = $request->session()->get('id');

        if($user=="" && $iduser==""){
            return view('login.login');
        }
        
        $equipment = Equipment::find($request->id);;
        $equipment->delete();

        $request->session()->put('notify', '3');
    	return redirect('equipment');

    }
}

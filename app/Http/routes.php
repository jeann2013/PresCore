<?php

use App\User;
use App\Company;
use App\Module;
use App\Access;
use App\Medicos;
use App\Specialtys;
use App\SpecialtysMedicos;
use App\Equipment;
use App\Planning;
use App\Patients;
use Illuminate\Support\Collection as Collection;
use Illuminate\Http\Request;


/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/



Route::group(['middleware' => ['web']], function () {


Route::get('/', function () {
    return view('cover');
});

Route::get('/dashboard', function (Request $request) {
	
	$user = $request->session()->get('user');
	$iduser = $request->session()->get('id');

	if($user=="" && $iduser==""){
		return redirect('login');
	}

	$module_principal = DB::table('modules')
	->select('modules.id', 
		'modules.description', 
		'modules.order', 
		'modules.id_father', 
		'modules.url', 
		'modules.messages', 
		'modules.status', 
		'modules.visible',
		'access.views', 
		'access.inserts', 
		'access.modifys', 
		'access.deletes')
	->join('access', function($join) use($iduser) {
	      $join->on('access.id_module', '=', 'modules.id')->where('access.id_user', '=',$iduser)
	      ->where('modules.url', '=','#');
	})->orderBy('modules.order')->orderBy('modules.id')->get();	

	$module_menu = DB::table('modules')
	->select('modules.id', 
		'modules.description', 
		'modules.order', 
		'modules.id_father', 
		'modules.url', 
		'modules.messages', 
		'modules.status', 
		'modules.visible',
		'access.views', 
		'access.inserts', 
		'access.modifys', 
		'access.deletes')
	->join('access', function($join) use($iduser) {
	      $join->on('access.id_module', '=', 'modules.id')->where('access.id_user', '=',$iduser)
	      ->where('modules.url', '<>','#');
	})->orderBy('modules.order')->get();	
    
    $module_principals = Collection::make($module_principal);
    $module_menus = Collection::make($module_menu);

    $users = User::find($iduser);


    return view('dashboard.dashboard',compact('module_principals','module_menus','users'));

});

Route::get('/cover', function () {
    return view('cover');
});





/*Users*/

Route::get('user',function(Request $request){

	$user = $request->session()->get('user');
	$iduser = $request->session()->get('id');

	if($user=="" && $iduser==""){
		return view('login.login');
	}

	$users = User::all();
	$companys = Company::all();
	
	$module = new Module;  
	$url = $request->path();
	$user_access = $module->accesos($iduser,$url);

	$noti_value = $request->session()->get('notify');
	
	if($noti_value<>"" && $noti_value<>null){
		$request->session()->forget('notify');
		$notifys['notify'] = $noti_value;
	}

	return view('users.users',compact('users','companys','user_access','notifys'));
});

Route::get('user/add',function(){

	$module = DB::table('modules')
		->select('modules.id', 
			'modules.description', 
			'modules.order', 
			'modules.id_father', 
			'modules.url', 
			'modules.messages', 
			'modules.status', 
			'modules.visible')
		->leftjoin('access', function($join){
		      $join->on('access.id_module', '=', 'modules.id');
		})->get();	
	    
	    $modules = Collection::make($module);
		
		foreach ($modules as $module){
	    	
    		$arr_view_arr[$module->id]=array('idview'.$module->id=>'view'.$module->id,'checkedview'.$module->id=>'nochecked','onclick'.$module->id=>'changeValue(this.value,'."'".'view'.$module->id."'".')','valueView'.$module->id=>'0');
    	
    		$arr_save_arr[$module->id]=array('idsave'.$module->id=>'save'.$module->id,'checkedsave'.$module->id=>'nochecked','onclick'.$module->id=>'changeValue(this.value,'."'".'save'.$module->id."'".')','valueSave'.$module->id=>'0');
    	
    		$arr_modify_arr[$module->id]=array('idmodify'.$module->id=>'modify'.$module->id,'checkedmodify'.$module->id=>'nochecked','onclick'.$module->id=>'changeValue(this.value,'."'".'modify'.$module->id."'".')','valueModify'.$module->id=>'0');
    	
    		$arr_delete_arr[$module->id]=array('iddelete'.$module->id=>'delete'.$module->id,'checkeddelete'.$module->id=>'nochecked','onclick'.$module->id=>'changeValue(this.value,'."'".'delete'.$module->id."'".')','valueDelete'.$module->id=>'0');

	    }


	$companys = DB::table('companys')->pluck('name', 'id');	
	return view('users.users_add',compact('companys','modules','arr_view_arr','arr_save_arr','arr_modify_arr','arr_delete_arr'));
});

Route::get('user/mod/{id}',function($id,Request $request){

	$user = $request->session()->get('user');
	$iduser = $request->session()->get('id');

	if($user=="" && $iduser==""){
		return view('login.login');
	}
	
	$users = User::find($id);
	$module = DB::table('modules')
	->select('modules.id', 
		'modules.description', 
		'modules.order', 
		'modules.id_father', 
		'modules.url', 
		'modules.messages', 
		'modules.status', 
		'modules.visible',
		'access.views', 
		'access.inserts', 
		'access.modifys', 
		'access.deletes')
	->leftjoin('access', function($join) use($id) {
	      $join->on('access.id_module', '=', 'modules.id')->where('access.id_user', '=',$id);
	})->get();	
    
    $modules = Collection::make($module);
	$companys = DB::table('companys')->pluck('name', 'id');	

	foreach ($modules as $module)
    {

    	if($module->views == 1){
    		$arr_view_arr[$module->id]=array('idview'.$module->id=>'view'.$module->id,'checkedview'.$module->id=>'checked','onclick'.$module->id=>'changeValue(this.value,'."'".'view'.$module->id."'".')','valueView'.$module->id=>'1');
    	}else{
    		$arr_view_arr[$module->id]=array('idview'.$module->id=>'view'.$module->id,'checkedview'.$module->id=>'nochecked','onclick'.$module->id=>'changeValue(this.value,'."'".'view'.$module->id."'".')','valueView'.$module->id=>'0');
    	}

    	if($module->inserts == 1){
    		$arr_save_arr[$module->id]=array('idsave'.$module->id=>'save'.$module->id,'checkedsave'.$module->id=>'checked','onclick'.$module->id=>'changeValue(this.value,'."'".'save'.$module->id."'".')','valueSave'.$module->id=>'1');
    	}else{
    		$arr_save_arr[$module->id]=array('idsave'.$module->id=>'save'.$module->id,'checkedsave'.$module->id=>'nochecked','onclick'.$module->id=>'changeValue(this.value,'."'".'save'.$module->id."'".')','valueSave'.$module->id=>'0');
    	}

    	if($module->modifys == 1){
    		$arr_modify_arr[$module->id]=array('idmodify'.$module->id=>'modify'.$module->id,'checkedmodify'.$module->id=>'checked','onclick'.$module->id=>'changeValue(this.value,'."'".'modify'.$module->id."'".')','valueModify'.$module->id=>'1');
    	}else{
    		$arr_modify_arr[$module->id]=array('idmodify'.$module->id=>'modify'.$module->id,'checkedmodify'.$module->id=>'nochecked','onclick'.$module->id=>'changeValue(this.value,'."'".'modify'.$module->id."'".')','valueModify'.$module->id=>'0');
    	}

		if($module->deletes == 1){
    		$arr_delete_arr[$module->id]=array('iddelete'.$module->id=>'delete'.$module->id,'checkeddelete'.$module->id=>'checked','onclick'.$module->id=>'changeValue(this.value,'."'".'delete'.$module->id."'".')','valueDelete'.$module->id=>'1');
    	}else{
    		$arr_delete_arr[$module->id]=array('iddelete'.$module->id=>'delete'.$module->id,'checkeddelete'.$module->id=>'nochecked','onclick'.$module->id=>'changeValue(this.value,'."'".'delete'.$module->id."'".')','valueDelete'.$module->id=>'0');
    	}
    	

    }

	return view('users.users_mod',compact('users','companys','modules','arr_view_arr','arr_save_arr','arr_modify_arr','arr_delete_arr'));
});

Route::get('user/del/{id}',function($id, Request $request){

	$user = $request->session()->get('user');
	$iduser = $request->session()->get('id');

	if($user=="" && $iduser==""){
		return view('login.login');
	}

	$module = DB::table('modules')
		->select('modules.id', 
			'modules.description', 
			'modules.order', 
			'modules.id_father', 
			'modules.url', 
			'modules.messages', 
			'modules.status', 
			'modules.visible',
			'access.views', 
			'access.inserts', 
			'access.modifys', 
			'access.deletes')
		->leftjoin('access', function($join) use($id) {
		      $join->on('access.id_module', '=', 'modules.id')->where('access.id_user', '=',$id);
		})->get();	

	$modules = Collection::make($module);
	
	foreach ($modules as $module)
    {

    	if($module->views == 1){
    		$arr_view_arr[$module->id]=array('idview'.$module->id=>'view'.$module->id,'checkedview'.$module->id=>'checked','onclick'.$module->id=>'changeValue(this.value,'."'".'view'.$module->id."'".')','valueView'.$module->id=>'1');
    	}else{
    		$arr_view_arr[$module->id]=array('idview'.$module->id=>'view'.$module->id,'checkedview'.$module->id=>'nochecked','onclick'.$module->id=>'changeValue(this.value,'."'".'view'.$module->id."'".')','valueView'.$module->id=>'0');
    	}

    	if($module->inserts == 1){
    		$arr_save_arr[$module->id]=array('idsave'.$module->id=>'save'.$module->id,'checkedsave'.$module->id=>'checked','onclick'.$module->id=>'changeValue(this.value,'."'".'save'.$module->id."'".')','valueSave'.$module->id=>'1');
    	}else{
    		$arr_save_arr[$module->id]=array('idsave'.$module->id=>'save'.$module->id,'checkedsave'.$module->id=>'nochecked','onclick'.$module->id=>'changeValue(this.value,'."'".'save'.$module->id."'".')','valueSave'.$module->id=>'0');
    	}

    	if($module->modifys == 1){
    		$arr_modify_arr[$module->id]=array('idmodify'.$module->id=>'modify'.$module->id,'checkedmodify'.$module->id=>'checked','onclick'.$module->id=>'changeValue(this.value,'."'".'modify'.$module->id."'".')','valueModify'.$module->id=>'1');
    	}else{
    		$arr_modify_arr[$module->id]=array('idmodify'.$module->id=>'modify'.$module->id,'checkedmodify'.$module->id=>'nochecked','onclick'.$module->id=>'changeValue(this.value,'."'".'modify'.$module->id."'".')','valueModify'.$module->id=>'0');
    	}

		if($module->deletes == 1){
    		$arr_delete_arr[$module->id]=array('iddelete'.$module->id=>'delete'.$module->id,'checkeddelete'.$module->id=>'checked','onclick'.$module->id=>'changeValue(this.value,'."'".'delete'.$module->id."'".')','valueDelete'.$module->id=>'1');
    	}else{
    		$arr_delete_arr[$module->id]=array('iddelete'.$module->id=>'delete'.$module->id,'checkeddelete'.$module->id=>'nochecked','onclick'.$module->id=>'changeValue(this.value,'."'".'delete'.$module->id."'".')','valueDelete'.$module->id=>'0');
    	}
    	

    }

	$users = User::find($id);
	$companys = DB::table('companys')->pluck('name', 'id');	
	return view('users.users_del',compact('users','companys','modules','arr_view_arr','arr_save_arr','arr_modify_arr','arr_delete_arr'));
});

Route::post('user/add','UserController@save');
Route::post('user/mod','UserController@update');
Route::post('user/del','UserController@delete');

/*Users*/

/*Companys*/
Route::get('company',function(Request $request){

	$user = $request->session()->get('user');
	$iduser = $request->session()->get('id');

	if($user=="" && $iduser ==""){
		return view('login.login');
	}
	
	$module = new Module; 
	$url = $request->path();
	$user_access = $module->accesos($iduser,$url);

	$noti_value = $request->session()->get('notify');
	
	if($noti_value<>"" && $noti_value<>null){
		$request->session()->forget('notify');
		$notifys['notify'] = $noti_value;
	}

	$companys = Company::all();
	return view('companys.companys',compact('companys','user_access','notifys'));
});

Route::get('company/add',function(Request $request){
	$user = $request->session()->get('user');
	$iduser = $request->session()->get('id');

	if($user=="" && $iduser==""){
		return view('login.login');
	}

	return view('companys.companys_add');
});

Route::get('company/mod/{id}',function($id, Request $request){
	
	$user = $request->session()->get('user');
	$iduser = $request->session()->get('id');

	if($user=="" && $iduser==""){
		return view('login.login');
	}

	$companys = Company::find($id);	
	return view('companys.companys_mod',compact('companys'));

});

Route::get('company/del/{id}',function($id,Request $request){

	$user = $request->session()->get('user');
	$iduser = $request->session()->get('id');

	if($user=="" && $iduser==""){
		return view('login.login');
	}

	$companys = Company::find($id);	
	return view('companys.companys_del',compact('companys'));

});

Route::post('company/add','CompanyController@save');
Route::post('company/mod','CompanyController@update');
Route::post('company/del','CompanyController@delete');
/*Companys*/

/*Modules*/
Route::get('module',function(Request $request){
	$user = $request->session()->get('user');
	$iduser = $request->session()->get('id');

	if($user=="" && $iduser==""){
		return view('login.login');
	}
	
	$module = new Module; 
	$url = $request->path();
	$user_access = $module->accesos($iduser,$url);
	$modules = Module::all();

	$noti_value = $request->session()->get('notify');
	
	if($noti_value<>"" && $noti_value<>null){
		$request->session()->forget('notify');
		$notifys['notify'] = $noti_value;
	}

	return view('modules.modules',compact('modules','user_access','notifys'));
});

Route::get('module/add',function(Request $request){
	$user = $request->session()->get('user');
	$iduser = $request->session()->get('id');

	if($user=="" && $iduser==""){
		return view('login.login');
	}

	return view('modules.modules_add');
});

Route::get('module/mod/{id}',function($id,Request $request){
	$user = $request->session()->get('user');
	$iduser = $request->session()->get('id');

	if($user=="" && $iduser==""){
		return view('login.login');
	}

	$modules = Module::find($id);	
	return view('modules.modules_mod',compact('modules'));

});

Route::get('module/del/{id}',function($id,Request $request){
	
	$user = $request->session()->get('user');
	$iduser = $request->session()->get('id');

	if($user=="" && $iduser==""){
		return view('login.login');
	}

	$modules = Module::find($id);	
	return view('modules.modules_del',compact('modules'));

});

Route::post('module/add','ModuleController@save');
Route::post('module/mod','ModuleController@update');
Route::post('module/del','ModuleController@delete');

/*Modules*/

/*Login*/
Route::post('login','UserController@login');
Route::get('logout','UserController@logout');

Route::get('/login', function () {
    return view('login.login');
});

/*Login*/

/*Specialtys*/
Route::get('specialtys', function (Request $request) {

    $user = $request->session()->get('user');
	$iduser = $request->session()->get('id');

	if($user=="" && $iduser==""){
		return view('login.login');
	}
	
	$module = new Module; 
	$url = $request->path();
	$user_access = $module->accesos($iduser,$url);
	$specialtys = Specialtys::all();
	$companys = Company::all();

	$noti_value = $request->session()->get('notify');
	
	if($noti_value<>"" && $noti_value<>null){
		$request->session()->forget('notify');
		$notifys['notify'] = $noti_value;
	}

	return view('specialtys.specialtys',compact('specialtys','user_access','notifys','companys'));

});

Route::get('specialtys/add',function(Request $request){
	$user = $request->session()->get('user');
	$iduser = $request->session()->get('id');

	if($user=="" && $iduser==""){
		return view('login.login');
	}

	$companys = DB::table('companys')->pluck('name', 'id');	
	return view('specialtys.specialtys_add',compact('companys','specialtys'));
});

Route::get('specialtys/mod/{id}',function($id,Request $request){
	$user = $request->session()->get('user');
	$iduser = $request->session()->get('id');

	if($user=="" && $iduser==""){
		return view('login.login');
	}

	$specialtys = Specialtys::find($id);	
	$companys = DB::table('companys')->pluck('name', 'id');	
	return view('specialtys.specialtys_mod',compact('companys','specialtys'));
});

Route::get('specialtys/del/{id}',function($id,Request $request){
	$user = $request->session()->get('user');
	$iduser = $request->session()->get('id');

	if($user=="" && $iduser==""){
		return view('login.login');
	}

	$specialtys = Specialtys::find($id);	
	$companys = DB::table('companys')->pluck('name', 'id');	
	return view('specialtys.specialtys_del',compact('companys','specialtys'));
});

Route::post('specialtys/add','SpecialtysController@save');
Route::post('specialtys/mod','SpecialtysController@update');
Route::post('specialtys/del','SpecialtysController@delete');

/*Specialtys*/


/*Medicos*/

Route::get('medicos', function (Request $request) {

    $user = $request->session()->get('user');
	$iduser = $request->session()->get('id');

	if($user=="" && $iduser==""){
		return view('login.login');
	}
	
	$module = new Module; 
	$url = $request->path();
	$user_access = $module->accesos($iduser,$url);
	$medicos = Medicos::all();
	$companys = Company::all();

	$noti_value = $request->session()->get('notify');
	
	if($noti_value<>"" && $noti_value<>null){
		$request->session()->forget('notify');
		$notifys['notify'] = $noti_value;
	}

	return view('medicos.medicos',compact('medicos','user_access','notifys','companys'));

});


Route::get('medicos/add',function(Request $request){
	$user = $request->session()->get('user');
	$iduser = $request->session()->get('id');

	if($user=="" && $iduser==""){
		return view('login.login');
	}

	$companys = DB::table('companys')->pluck('name', 'id');	
	$specialtys = DB::table('specialtys')->pluck('name', 'id');	
	return view('medicos.medicos_add',compact('companys','specialtys'));
});

Route::get('medicos/mod/{id}',function($id,Request $request){
	
	$user = $request->session()->get('user');
	$iduser = $request->session()->get('id');

	if($user=="" && $iduser==""){
		return view('login.login');
	}
	
	$companys = DB::table('companys')->pluck('name', 'id');	
	$specialtys = DB::table('specialtys')->pluck('name', 'id');	
	$medico = DB::table('medicos')
		->select('medicos.id', 
			'medicos.firtsname', 
			'medicos.lastname', 
			'medicos.phone', 
			'medicos.cellphone',
			'medicos.address',
			'medicos.id_user',
			'medicos.id_company',
			'medicos.status',
			'specialtys_medicos.id_specialty',
			'specialtys_medicos.id as specialtys_medicos_id'
			)
		->join('specialtys_medicos', function($join) use($id) {
		      $join->on('specialtys_medicos.id_medico', '=', 'medicos.id')->where('specialtys_medicos.id_medico', '=',$id);
		})->get();	

	$medicos = Collection::make($medico);

	return view('medicos.medicos_mod',compact('medicos','companys','specialtys'));

});

Route::get('medicos/del/{id}',function($id,Request $request){
	
	$user = $request->session()->get('user');
	$iduser = $request->session()->get('id');

	if($user=="" && $iduser==""){
		return view('login.login');
	}

	
	$companys = DB::table('companys')->pluck('name', 'id');	
	$specialtys = DB::table('specialtys')->pluck('name', 'id');	
	$medico = DB::table('medicos')
		->select('medicos.id', 
			'medicos.firtsname', 
			'medicos.lastname', 
			'medicos.phone', 
			'medicos.cellphone',
			'medicos.address',
			'medicos.id_user',
			'medicos.id_company',
			'medicos.status',
			'specialtys_medicos.id_specialty',
			'specialtys_medicos.id as specialtys_medicos_id'
			)
		->join('specialtys_medicos', function($join) use($id) {
		      $join->on('specialtys_medicos.id_medico', '=', 'medicos.id')->where('specialtys_medicos.id_medico', '=',$id);
		})->get();	

	$medicos = Collection::make($medico);

	return view('medicos.medicos_del',compact('medicos','companys','specialtys'));

});


Route::post('medicos/add','MedicosController@save');
Route::post('medicos/mod','MedicosController@update');
Route::post('medicos/del','MedicosController@delete');


/*Medicos*/


/*Equipment*/
Route::get('equipment',function(Request $request){

	$user = $request->session()->get('user');
	$iduser = $request->session()->get('id');

	if($user=="" && $iduser ==""){
		return view('login.login');
	}
	
	$module = new Module; 
	$url = $request->path();
	$user_access = $module->accesos($iduser,$url);

	$noti_value = $request->session()->get('notify');
	
	if($noti_value<>"" && $noti_value<>null){
		$request->session()->forget('notify');
		$notifys['notify'] = $noti_value;
	}

	$equipment = Equipment::all();
	return view('equipment.equipment',compact('equipment','user_access','notifys'));
});

Route::get('equipment/add',function(Request $request){
	$user = $request->session()->get('user');
	$iduser = $request->session()->get('id');

	if($user=="" && $iduser==""){
		return view('login.login');
	}
	
	$companys = DB::table('companys')->pluck('name', 'id');	
	return view('equipment.equipment_add',compact('companys'));
});

Route::get('equipment/mod/{id}',function($id, Request $request){
	
	$user = $request->session()->get('user');
	$iduser = $request->session()->get('id');

	if($user=="" && $iduser==""){
		return view('login.login');
	}

	$equipment = Equipment::find($id);
	$companys = DB::table('companys')->pluck('name', 'id');	
	return view('equipment.equipment_mod',compact('companys','equipment'));

});

Route::get('equipment/del/{id}',function($id,Request $request){

	$user = $request->session()->get('user');
	$iduser = $request->session()->get('id');

	if($user=="" && $iduser==""){
		return view('login.login');
	}

	$equipment = Equipment::find($id);	
	$companys = DB::table('companys')->pluck('name', 'id');	
	return view('equipment.equipment_del',compact('companys','equipment'));

});

Route::post('equipment/add','EquipmentController@save');
Route::post('equipment/mod','EquipmentController@update');
Route::post('equipment/del','EquipmentController@delete');
/*Equipment*/


/*Patients*/

Route::get('patients',function(Request $request){

	$user = $request->session()->get('user');
	$iduser = $request->session()->get('id');

	if($user=="" && $iduser ==""){
		return view('login.login');
	}
	
	$module = new Module; 
	$url = $request->path();
	$user_access = $module->accesos($iduser,$url);

	$noti_value = $request->session()->get('notify');
	
	if($noti_value<>"" && $noti_value<>null){
		$request->session()->forget('notify');
		$notifys['notify'] = $noti_value;
	}

	$patients = Patients::all();
	return view('patients.patients',compact('patients','user_access','notifys'));
});

Route::get('patients/add',function(Request $request){
	$user = $request->session()->get('user');
	$iduser = $request->session()->get('id');

	if($user=="" && $iduser==""){
		return view('login.login');
	}
	
	$companys = DB::table('companys')->pluck('name', 'id');	
	return view('patients.patients_add',compact('companys'));
});

Route::get('patients/mod/{id}',function($id, Request $request){
	
	$user = $request->session()->get('user');
	$iduser = $request->session()->get('id');

	if($user=="" && $iduser==""){
		return view('login.login');
	}

	$patients = Patients::find($id);
	$companys = DB::table('companys')->pluck('name', 'id');	
	return view('patients.patients_mod',compact('companys','patients'));

});

Route::get('patients/del/{id}',function($id,Request $request){

	$user = $request->session()->get('user');
	$iduser = $request->session()->get('id');

	if($user=="" && $iduser==""){
		return view('login.login');
	}

	$patients = Patients::find($id);
	$companys = DB::table('companys')->pluck('name', 'id');	
	return view('patients.patients_del',compact('companys','patients'));

});

Route::post('patients/add','PatientsController@save');
Route::post('patients/mod','PatientsController@update');
Route::post('patients/del','PatientsController@delete');

/*Patients*/


/*ChangePass*/
Route::get('/change', function (Request $request) {
	$user = $request->session()->get('user');
	$iduser = $request->session()->get('id');

	if($user=="" && $iduser==""){
		return view('login.login');
	}

    return view('change.change');
});

Route::post('change','UserController@change');
/*ChangePass*/


/*Planing*/

Route::get('planning',function(Request $request){

	$user = $request->session()->get('user');
	$iduser = $request->session()->get('id');

	if($user=="" && $iduser ==""){
		return view('login.login');
	}
	
	$module = new Module; 
	$url = $request->path();
	$user_access = $module->accesos($iduser,$url);

	$noti_value = $request->session()->get('notify');
	
	if($noti_value<>"" && $noti_value<>null){
		$request->session()->forget('notify');
		$notifys['notify'] = $noti_value;
	}

	$planning = Planning::all();
	return view('agenda.planning',compact('planning','user_access','notifys'));
});

Route::post('planning/add','PlanningController@save');
Route::post('planning/mod','PlanningController@update');
Route::post('planning/del','PlanningController@delete');

/*Planing*/


});





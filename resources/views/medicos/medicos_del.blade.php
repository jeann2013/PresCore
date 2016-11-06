@extends('layouts.header')

@section('content')
{!! Form::open(array('url' => 'medicos/del')) !!}
 
 @foreach ($medicos as $medico) 

  <table class="table">
    <tr>
        <td colspan="5">
            
            Medicos

        </td>
    </tr>
    <tr>
        <td colspan="5">
            
            <a href="{{ url('medicos') }}" class="btn btn-default" role="button">Back </a>

        </td>
    </tr>
        <tr>
            <td>Firts Name</td>
            <td> {!! Form::text('fname',$medico->firtsname,array('class' => 'form-control','id'=>'fname','required')) !!} </td>
        </tr>
        <tr>
            <td>Last Name</td>
            <td> {!! Form::text('lname',$medico->lastname,array('class' => 'form-control','id'=>'lname','required')) !!} </td>
        </tr>
        <tr>
            <td>Companys</td>
            <td> {!! Form::select('id_company', $companys, $medico->id_company, ['placeholder' => 'Select','class'=>'form-control','required']); !!} 
            </td>
        </tr>
        <tr>
            <td>Specialtys</td>
            <td> {!! Form::select('id_specialtys', $specialtys, $medico->id_specialty, ['placeholder' => 'Select','class'=>'form-control','required']); !!} 
            </td>
        </tr>
        <tr>
            <td>Phone</td>
            <td> {!! Form::text('phone',$medico->phone,array('class' => 'form-control','id'=>'phone','required')) !!} </td>
        </tr>
        <tr>
            <td>Cell Phone</td>
            <td> {!! Form::text('cellphone',$medico->cellphone,array('class' => 'form-control','id'=>'cellphone','required')) !!} </td>
        </tr>
        <tr>
            <td>Address</td>
            <td> {!! Form::text('address',$medico->address,array('class' => 'form-control','id'=>'address','required')) !!} </td>
        </tr>
        <tr>
            <td>Status</td>
            <td> {!! Form::select('status', array('1' => 'Active', '0' => 'No Active'), $medico->status, ['class'=>'form-control','required']); !!} </td>
        </tr> 

        <tr>
            <td colspan="2">
                {!! Form::submit('Delete!',array('class' => 'btn btn-primary','id'=>'delete')); !!}
                {!! Form::hidden('id',$medico->id,array('id'=>'id')) !!}
                {!! Form::hidden('idspecialtys_medicos',$medico->specialtys_medicos_id,array('id'=>'id')) !!}
                
                
            </td>
        </tr>         
    </table>  
    @endforeach
  {!! Form::close() !!} 

@endsection
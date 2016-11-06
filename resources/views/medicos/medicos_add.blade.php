@extends('layouts.header')

@section('content')
{!! Form::open(array('url' => 'medicos/add')) !!}

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
            <td> {!! Form::text('fname','',array('class' => 'form-control','id'=>'fname','required')) !!} </td>
        </tr>
        <tr>
            <td>Last Name</td>
            <td> {!! Form::text('lname','',array('class' => 'form-control','id'=>'lname','required')) !!} </td>
        </tr>
        <tr>
            <td>Companys</td>
            <td> {!! Form::select('id_company', $companys, '', ['placeholder' => 'Select','class'=>'form-control','required']); !!} 
            </td>
        </tr>
        <tr>
            <td>Specialtys</td>
            <td> {!! Form::select('id_specialtys', $specialtys, '', ['placeholder' => 'Select','class'=>'form-control','required']); !!} 
            </td>
        </tr>
        <tr>
            <td>Phone</td>
            <td> {!! Form::text('phone','',array('class' => 'form-control','id'=>'phone','required')) !!} </td>
        </tr>
        <tr>
            <td>Cell Phone</td>
            <td> {!! Form::text('cellphone','',array('class' => 'form-control','id'=>'cellphone','required')) !!} </td>
        </tr>
        <tr>
            <td>Address</td>
            <td> {!! Form::text('address','',array('class' => 'form-control','id'=>'address','required')) !!} </td>
        </tr>

        <tr>
            <td colspan="2">
                {!! Form::submit('Save!',array('class' => 'btn btn-primary','id'=>'save')); !!}
                
                
            </td>
        </tr>         
    </table>   
  {!! Form::close() !!} 

@endsection
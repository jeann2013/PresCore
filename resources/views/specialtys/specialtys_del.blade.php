@extends('layouts.header')

@section('content')
{!! Form::open(array('url' => 'specialtys/del')) !!}

  <table class="table">
    <tr>
        <td colspan="5">
            
            Specialtys

        </td>
    </tr>
    <tr>
        <td colspan="5">
            
            <a href="{{ url('specialtys') }}" class="btn btn-default" role="button">Back </a>

        </td>
    </tr>
        <tr>
            <td>Name</td>
            <td> {!! Form::text('name',$specialtys->name,array('class' => 'form-control','id'=>'name','required')) !!} </td>
        </tr>
        <tr>
            <td>Companys</td>
            <td> {!! Form::select('id_company', $companys,$specialtys->id_company , ['placeholder' => 'Select','class'=>'form-control','required']); !!} 
            </td>
        </tr>
        
        <tr>
            <td colspan="2">
                {!! Form::submit('Delete!',array('class' => 'btn btn-primary','id'=>'delete')); !!}
                {!! Form::hidden('id',$specialtys->id,array('id'=>'id')) !!}
            </td>
        </tr>         
    </table>   
  {!! Form::close() !!} 

@endsection
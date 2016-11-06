@extends('layouts.header')

@section('content')
{!! Form::open(array('url' => 'specialtys/add')) !!}

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
            <td> {!! Form::text('name','',array('class' => 'form-control','id'=>'name','required')) !!} </td>
        </tr>
        <tr>
            <td>Companys</td>
            <td> {!! Form::select('id_company', $companys, '', ['placeholder' => 'Select','class'=>'form-control','required']); !!} 
            </td>
        </tr>
        
        <tr>
            <td colspan="2">
                {!! Form::submit('Save!',array('class' => 'btn btn-primary','id'=>'save')); !!}
                
                
            </td>
        </tr>         
    </table>   
  {!! Form::close() !!} 

@endsection
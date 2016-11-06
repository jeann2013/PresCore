@extends('layouts.header')

@section('content')
{!! Form::open(array('url' => 'company/add')) !!}

  <table class="table">
    <tr>
        <td colspan="5">
            
            Companys

        </td>
    </tr>
    <tr>
        <td colspan="5">
            
            <a href="{{ url('company') }}" class="btn btn-default" role="button">Back </a>

        </td>
    </tr>
        <tr>
            <td>Name</td>
            <td> {!! Form::text('name','',array('class' => 'form-control','id'=>'name','required')) !!} </td>
        </tr>
        
        <tr>
            <td>Ruc</td>
            <td> {!! Form::text('ruc','',array('class' => 'form-control','id'=>'ruc','required')) !!} </td>
        </tr>
        
        <tr>
            <td>Phone</td>
            <td> {!! Form::text('phone','',array('class' => 'form-control','id'=>'phone','required')) !!} </td>
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
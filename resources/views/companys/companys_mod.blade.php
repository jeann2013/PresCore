@extends('layouts.header')

@section('content')
{!! Form::open(array('url' => 'company/mod')) !!}

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
            <td> {!! Form::text('name',$companys->name ,array('class' => 'form-control','id'=>'name')) !!} </td>
        </tr>
        
        <tr>
            <td>Ruc</td>
            <td> {!! Form::text('ruc',$companys->ruc,array('class' => 'form-control','id'=>'ruc')) !!} </td>
        </tr>
        
        <tr>
            <td>Phone</td>
            <td> {!! Form::text('phone',$companys->phone,array('class' => 'form-control','id'=>'phone')) !!} </td>
        </tr>
        <tr>
            <td>Address</td>
            <td> {!! Form::text('address',$companys->address,array('class' => 'form-control','id'=>'address')) !!} </td>
        </tr>   
        <tr>
            <td colspan="2">
                {!! Form::submit('Update!',array('class' => 'btn btn-primary','id'=>'update')); !!}
                {!! Form::hidden('id',$companys->id,array('id'=>'id')) !!}
            </td>
        </tr>         
    </table>   
  {!! Form::close() !!} 

@endsection
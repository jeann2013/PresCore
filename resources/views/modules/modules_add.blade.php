@extends('layouts.header')

@section('content')
{!! Form::open(array('url' => 'module/add')) !!}

  <table class="table">
    <tr>
        <td colspan="5">
            
            Modules

        </td>
    </tr>
    <tr>
        <td colspan="5">
            
            <a href="{{ url('module') }}" class="btn btn-default" role="button">Back </a>

        </td>
    </tr>
        <tr>
            <td>Description</td>
            <td> {!! Form::text('description','',array('class' => 'form-control','id'=>'description','required')) !!} </td>
        </tr>
        
        <tr>
            <td>Order</td>
            <td> {!! Form::text('order','',array('class' => 'form-control','id'=>'order','required')) !!} </td>
        </tr>
        
        <tr>
            <td>ID-father</td>
            <td> {!! Form::text('id_father','',array('class' => 'form-control','id'=>'id_father','required')) !!} </td>
        </tr>
        <tr>
            <td>URL</td>
            <td> {!! Form::text('url','',array('class' => 'form-control','id'=>'url','required')) !!} </td>
        </tr>   
        <tr>
            <td>Visible</td>
            <td> {!! Form::select('visible', array('1' => 'Yes', '0' => 'No'), '', ['class'=>'form-control','required']); !!} </td>
        </tr>  
         <tr>
            <td>Status</td>
            <td> {!! Form::select('status', array('1' => 'Active', '0' => 'No Active'), null, ['class'=>'form-control','required']); !!} </td>
        </tr>    
        <tr>
            <td colspan="2">
                {!! Form::submit('Save!',array('class' => 'btn btn-primary','id'=>'save')); !!}
            </td>
        </tr>         
    </table>   
  {!! Form::close() !!} 

@endsection
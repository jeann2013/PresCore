@extends('layouts.header')

@section('content')
{!! Form::open(array('url' => 'module/mod')) !!}

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
            <td> {!! Form::text('description',$modules->description,array('class' => 'form-control','id'=>'description','required')) !!} </td>
        </tr>
        
        <tr>
            <td>Order</td>
            <td> {!! Form::text('order',$modules->order,array('class' => 'form-control','id'=>'order','required')) !!} </td>
        </tr>
        
        <tr>
            <td>ID-father</td>
            <td> {!! Form::text('id_father',$modules->id_father,array('class' => 'form-control','id'=>'id_father','required')) !!} </td>
        </tr>
        <tr>
            <td>URL</td>
            <td> {!! Form::text('url',$modules->url,array('class' => 'form-control','id'=>'url','required')) !!} </td>
        </tr>   
        <tr>
            <td>Visible</td>
            <td> {!! Form::select('visible', array('1' => 'Yes', '0' => 'No'), $modules->visible, ['class'=>'form-control','required']); !!} </td>
        </tr>   
          <tr>
            <td>Status</td>
            <td> {!! Form::select('status', array('1' => 'Active', '0' => 'No Active'), $modules->status, ['class'=>'form-control','required']); !!} </td>
        </tr>     
        <tr>
            <td colspan="2">
                {!! Form::submit('Update!',array('class' => 'btn btn-primary','id'=>'update')); !!}
                {!! Form::hidden('id',$modules->id,array('id'=>'id')) !!}
            </td>
        </tr>         
    </table>   
  {!! Form::close() !!} 

@endsection
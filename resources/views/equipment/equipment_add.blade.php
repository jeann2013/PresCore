@extends('layouts.header')

@section('content')
{!! Form::open(array('url' => 'equipment/add')) !!}

  <table class="table">
    <tr>
        <td colspan="5">
            
            Equipment

        </td>
    </tr>
    <tr>
        <td colspan="5">
            
            <a href="{{ url('equipment') }}" class="btn btn-default" role="button">Back </a>

        </td>
    </tr>
        <tr>
            <td>Description</td>
            <td> {!! Form::text('description','',array('class' => 'form-control','id'=>'description','required')) !!} </td>
        </tr>
        
        <tr>
            <td>Brand</td>
            <td> {!! Form::text('brand','',array('class' => 'form-control','id'=>'brand','required')) !!} </td>
        </tr>
        
        <tr>
            <td>Model</td>
            <td> {!! Form::text('model','',array('class' => 'form-control','id'=>'model','required')) !!} </td>
        </tr>
        <tr>
            <td>TimeAdd</td>
            <td> {!! Form::text('timeadd','',array('class' => 'form-control','id'=>'timeadd','required')) !!} </td>
        </tr>  
        <tr>
            <td>Cost</td>
            <td> {!! Form::text('cost','',array('class' => 'form-control','id'=>'cost','required')) !!} </td>
        </tr>   
         <tr>
            <td>Companys</td>
            <td> {!! Form::select('id_company', $companys, '', ['placeholder' => 'Select','class'=>'form-control','required']); !!} 
            </td>
        </tr>
         <tr>
            <td>Status</td>
            <td> {!! Form::select('status', array('1' => 'Active', '0' => 'No Active'), '', ['class'=>'form-control','required']); !!} </td>
        </tr>   
        <tr>
            <td colspan="2">
                {!! Form::submit('Save!',array('class' => 'btn btn-primary','id'=>'save')); !!}
                
            </td>
        </tr>         
    </table>   
  {!! Form::close() !!} 

@endsection
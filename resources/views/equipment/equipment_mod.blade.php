@extends('layouts.header')

@section('content')
{!! Form::open(array('url' => 'equipment/mod')) !!}

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
            <td> {!! Form::text('description',$equipment->description,array('class' => 'form-control','id'=>'description','required')) !!} </td>
        </tr>
        
        <tr>
            <td>Brand</td>
            <td> {!! Form::text('brand',$equipment->brand,array('class' => 'form-control','id'=>'brand','required')) !!} </td>
        </tr>
        
        <tr>
            <td>Model</td>
            <td> {!! Form::text('model',$equipment->model,array('class' => 'form-control','id'=>'model','required')) !!} </td>
        </tr>
        <tr>
            <td>TimeAdd</td>
            <td> {!! Form::text('timeadd',$equipment->timeadd,array('class' => 'form-control','id'=>'timeadd','required')) !!} </td>
        </tr>  
        <tr>
            <td>Cost</td>
            <td> {!! Form::text('cost',$equipment->cost,array('class' => 'form-control','id'=>'cost','required')) !!} </td>
        </tr>   
         <tr>
            <td>Companys</td>
            <td> {!! Form::select('id_company', $companys, $equipment->id_company, ['placeholder' => 'Select','class'=>'form-control','required']); !!} 
            </td>
        </tr>
         <tr>
            <td>Status</td>
            <td> {!! Form::select('status', array('1' => 'Active', '0' => 'No Active'), $equipment->status, ['class'=>'form-control','required']); !!} </td>
        </tr>   
        <tr>
            <td colspan="2">
                {!! Form::submit('Update!',array('class' => 'btn btn-primary','id'=>'Update')); !!}
                {!! Form::hidden('id',$equipment->id,array('id'=>'id')) !!}
                
            </td>
        </tr>         
    </table>   
  {!! Form::close() !!} 

@endsection
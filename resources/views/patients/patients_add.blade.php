@extends('layouts.header')
@section('content')

{!! Form::open(array('url' => 'patients/add')) !!}

  <table class="table">
    <tr>
        <td colspan="6">
            
            Patients

        </td>
    </tr>
    <tr>
        <td colspan="6">
            
            <a href="{{ url('patients') }}" class="btn btn-default" role="button">Back </a>

        </td>
    </tr>
        <tr>
            <td>Firts Name</td>
            <td> {!! Form::text('firtsname','',array('class' => 'form-control','id'=>'firtsname','required')) !!} </td>
        </tr>
        
        <tr>
            <td>Last Name</td>
            <td> {!! Form::text('lastname','',array('class' => 'form-control','id'=>'lastname','required')) !!} </td>
        </tr>
        
        <tr>
            <td>ID Document</td>
            <td> {!! Form::text('iddocument','',array('class' => 'form-control','id'=>'iddocument','required')) !!} </td>
        </tr>
        <tr>
            <td>Phone</td>
            <td> {!! Form::text('phone','',array('class' => 'form-control','id'=>'phone','required')) !!} </td>
        </tr>
        <tr>
            <td>Cell Phone</td>
            <td> {!! Form::text('cell_phone','',array('class' => 'form-control','id'=>'cell_phone','required')) !!} </td>
        </tr>
        <tr>
            <td>Address</td>
            <td> {!! Form::text('address','',array('class' => 'form-control','id'=>'address','required')) !!} </td>
        </tr>
        <tr>
            <td>Company</td>
            <td> {!! Form::select('id_company', $companys, '', ['placeholder' => 'Select','class'=>'form-control','required']); !!} </td>
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

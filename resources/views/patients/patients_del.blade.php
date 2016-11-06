@extends('layouts.header')
@section('content')

{!! Form::open(array('url' => 'patients/del')) !!}

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
            <td> {!! Form::text('firtsname',$patients->firtsname,array('class' => 'form-control','id'=>'firtsname','required')) !!} </td>
        </tr>
        
        <tr>
            <td>Last Name</td>
            <td> {!! Form::text('lastname',$patients->lastname,array('class' => 'form-control','id'=>'lastname','required')) !!} </td>
        </tr>
        
        <tr>
            <td>ID Document</td>
            <td> {!! Form::text('iddocument',$patients->iddocument,array('class' => 'form-control','id'=>'iddocument','required')) !!} </td>
        </tr>
        <tr>
            <td>Phone</td>
            <td> {!! Form::text('phone',$patients->phone,array('class' => 'form-control','id'=>'phone','required')) !!} </td>
        </tr>
        <tr>
            <td>Cell Phone</td>
            <td> {!! Form::text('cell_phone',$patients->cell_phone,array('class' => 'form-control','id'=>'cell_phone','required')) !!} </td>
        </tr>
        <tr>
            <td>Address</td>
            <td> {!! Form::text('address',$patients->address,array('class' => 'form-control','id'=>'address','required')) !!} </td>
        </tr>
        <tr>
            <td>Company</td>
            <td> {!! Form::select('id_company', $companys, $patients->id_company, ['placeholder' => 'Select','class'=>'form-control','required']); !!} </td>
        </tr>   
        <tr>
            <td>Status</td>
            <td> {!! Form::select('status', array('1' => 'Active', '0' => 'No Active'), $patients->status, ['class'=>'form-control','required']); !!} </td>
        </tr>   
        <tr>   
            <td colspan="2">
                {!! Form::submit('Delete!',array('class' => 'btn btn-primary','id'=>'delete')); !!}
                {!! Form::hidden('id',$patients->id,array('id'=>'id')) !!}
            </td>
        </tr> 
    </table>
  {!! Form::close() !!} 

@endsection

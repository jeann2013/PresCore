@extends('layouts.header')

@section('content')

@if(isset($changes))
	<div class="alert alert-success" role="alert">
		<button class="close" aria-label="Close" data-dismiss="alert" type="button">
		<span aria-hidden="true">×</span>
		</button>
		<strong>Well done!</strong> You Change Password successfully
	</div>
@endif

{!! Form::open(array('change' => 'login','class'=>'')) !!}

<table class="table">
	<tr class="">	
		<td colspan="4"><a href="{{ url('dashboard') }}" class="btn btn-default" role="button">Back </a></td>		
	</tr>
	<tr class="success">
		<td colspan="4">Change of Password</td>
	</tr>
	<tr>
		<td>Write Password New</td>
		<td>{!! Form::password('password1',array('class' => 'form-control','id'=>'password1','required')) !!}</td>
	</tr>
	<tr>
		<td>Re-Write Password New</td>
		<td>{!! Form::password('password2',array('class' => 'form-control','id'=>'password2','required')) !!}</td>
	</tr>
	<tr>
		<td colspan="4">
			{!! Form::submit('Change',array('class' => 'btn btn-lg btn-primary btn-block','id'=>'change','onclick'=>'return compare();')); !!}
		</td>
	</tr>
</table>

{!! Form::close() !!} 

@endsection
<script>
	function compare(){
		var pass1 = $('#password1').val();
		var pass2 = $('#password2').val();

		if(pass1!=pass2){
			alert('Password are Diferent!');
			$('#password2').val('');
			$('#password1').val('');
			$('#password1').focus();
			return false;
		}else{return true;}
	}
</script>
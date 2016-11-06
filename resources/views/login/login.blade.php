@extends('layouts.header')
@section('content')
     <div class="container">

     {!! Form::open(array('url' => 'login','class'=>'form-signin')) !!}
        <h3 class="form-signin-heading">Login (Necesito un Medico)</h3>
        <label for="inputEmail" class="sr-only">Usuario</label>
        {!! Form::text('user','',array('class' => 'form-control','id'=>'user','required','autofocus')) !!}
        <label for="inputPassword" class="sr-only">Clave</label>
        {!! Form::password('password',array('class' => 'form-control','id'=>'password','required')) !!}
        {!! Form::submit('Enter',array('class' => 'btn btn-lg btn-primary btn-block','id'=>'enter')); !!}
        <a class="btn btn-lg btn-success btn-block" href="cover">Back</a>
        <br>
        @if(isset($users) && $users=='0')
            <div class="alert alert-warning alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong>Warning!</strong> User Not Found!
            </div>
        @endif
        <div align="center">
        <span class="label label-default">Necesito un Medico v0.01</span>
        </div>

    {!! Form::close() !!} 


    </div> <!-- /container -->

@endsection


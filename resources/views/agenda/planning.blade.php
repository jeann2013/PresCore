@extends('layouts.header')
@section('content')

@if(isset($notifys))

  <div class="alert alert-success" role="alert">
    <button class="close" aria-label="Close" data-dismiss="alert" type="button">
    <span aria-hidden="true">×</span>
    </button>
        @foreach ($notifys as $noti => $valor)
          @if($valor == 1)
            <strong>Well done!</strong> You successfully insert your Data.
          @endif
          @if($valor == 2)
            <strong>Well done!</strong> You successfully modified your Data.
          @endif
          @if($valor == 3)
            <strong>Well done!</strong> You successfully removed your Data,
          @endif
        @endforeach
      
  </div>
  
@endif

<table class="table table-striped">
 
</table>    
@endsection
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
  <tr>
      <td colspan="6">
          @foreach ($user_access as $user_acces)
              @if($user_acces->inserts == 1)
                <a href="{{ url('specialtys/add') }}" class="btn btn-default" role="button">Add </a>
              @else
                <a href="#" class="btn btn-default" role="button">No Add  </a>
              @endif
          @endforeach
          <a href="{{ url('dashboard') }}" class="btn btn-default" role="button">Back </a>

      </td>
  </tr>
      <tr class="success">
          <td>Name</td>
          <td>Company</td>
          <td>Status</td>
          <td>Modify</td>
          <td>Delete</td>
      </tr>
          

          @foreach ($specialtys as $specialty)
             
                <tr>
                    <td>{{ $specialty->name }}</td>

                    

                    @foreach ($companys as $company)
                      @if($specialty->id_company == $company->id) 
                        <td>{{ $company->name }}</td>
                      @endif
                    @endforeach          
                    <td>@if($specialty->status == 1){{'Active'}} @else{{'Active'}} @endif</td>
                    @foreach ($user_access as $user_acces)
                      @if($user_acces->modifys == 1) 
                        <td><a href="specialtys/mod/{{ $specialty->id }}" class="btn btn-success" role="button">Modify</a></td>
                      @else
                        <td><a href="#" class="btn btn-default" role="button">No Modify</a></td>
                      @endif
                      @if($user_acces->deletes==1) 
                        <td><a href="specialtys/del/{{ $specialty->id }}" class="btn btn-danger" role="button">Delete</a></td>
                      @else
                        <td><a href="#" class="btn btn-default" role="button">No Delete</a></td>
                      @endif
                    @endforeach

                </tr>
              
          @endforeach
  </table>    
@endsection
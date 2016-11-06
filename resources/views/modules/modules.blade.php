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
      <td colspan="9">
          @foreach ($user_access as $user_acces)
              @if($user_acces->inserts == 1)
                <a href="{{ url('module/add') }}" class="btn btn-default" role="button">Add </a>
              @else
                <a href="#" class="btn btn-default" role="button">No Add  </a>
              @endif
          @endforeach
          
          <a href="{{ url('dashboard') }}" class="btn btn-default" role="button">Back </a>

      </td>
  </tr>
      <tr class="success">
          <td>Id</td>
          <td>Description</td>
          <td>URL</td>
          <td>Status</td>
          <td>ID Father</td>
          <td>Visble</td>
          <td>Order</td>
          <td>Modify</td>
          <td>Delete</td>
      </tr> 
         
          @foreach ($modules as $module)
      
              <tr>
                  <td>{{ $module->id }}</td>  
                  <td>{{ $module->description }}</td>  
                  <td>{{ $module->url }}</td>
                  <td> @if($module->status == 0) {{'No Active'}} @else {{'Active'}} @endif  </td>
                   <td> 
                        @if( $father = $modules->find($module->id_father))
                          {{ 
                              $father->description
                          }}
                         @else
                         {{ 'S/F' }}
                        @endif
                   </td>                  
                  <td> @if($module->visible == 1) {{'Visible'}} @else {{'No Visible'}} @endif  </td>
                  <td>{{ $module->order }}</td>
                    @foreach ($user_access as $user_acces)
                      @if($user_acces->modifys == 1) 
                        <td><a href="module/mod/{{ $module->id }}" class="btn btn-success" role="button">Modify</a></td>
                      @else
                        <td><a href="#" class="btn btn-default" role="button">No Modify</a></td>
                      @endif
                      @if($user_acces->deletes==1) 
                        <td><a href="module/del/{{ $module->id }}" class="btn btn-danger" role="button">Delete</a></td>
                      @else
                        <td><a href="#" class="btn btn-default" role="button">No Delete</a></td>
                      @endif
                    @endforeach
              </tr>
          @endforeach
  </table>    
@endsection
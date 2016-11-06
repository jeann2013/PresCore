@extends('layouts.header')

@section('content')
{!! Form::open(array('url' => 'user/del')) !!}

  <table class="table">
    <tr>
        <td colspan="5">
            
            Users

        </td>
    </tr>
    <tr>
        <td colspan="5">
            
            <a href="{{ url('user') }}" class="btn btn-default" role="button">Back </a>

        </td>
    </tr>
        <tr>
            <td>Firts Name</td>
            <td> {!! Form::text('firtsname',$users->firtsname ,array('class' => 'form-control','id'=>'firtsname','required')) !!} </td>
        </tr>
        
        <tr>
            <td>Last Name</td>
            <td> {!! Form::text('lastname',$users->lastname,array('class' => 'form-control','id'=>'lastname','required')) !!} </td>
        </tr>
        
        <tr>
            <td>User</td>
            <td> {!! Form::text('user',$users->user,array('class' => 'form-control','id'=>'user','required')) !!} </td>
        </tr>
        <tr>
            <td>Company</td>
            <td> {!! Form::select('id_company', $companys, $users->id_company , ['placeholder' => 'Select','class'=>'form-control','required']); !!} </td>
        </tr>   
        <tr>
            <td>Status</td>
            <td> {!! Form::select('status', array('1' => 'Active', '0' => 'No Active'), $users->status, ['class'=>'form-control','required']); !!} </td>
        </tr>  
        <tr>
            <td colspan="2">
                {!! Form::submit('Delete!',array('class' => 'btn btn-primary','id'=>'delete')); !!}
                {!! Form::hidden('id',$users->id,array('id'=>'id')) !!}
            </td>
        </tr>         
    </table>   

    <table class="table">
        <tr class="success">
            <td>Module</td>
            <td>View</td>
            <td>Save</td>
            <td>Modify</td>
            <td>Delete</td>
        </tr>
        <tr>
            <td>All</td>
            <td>{!! Form::checkbox('view_all','0',false,array('id'=>'view_all','onclick'=>'all_view(this.value)')) !!}</td>
            <td>{!! Form::checkbox('save_all','0',false,array('id'=>'save_all','onclick'=>'all_save(this.value)')) !!}</td>
            <td>{!! Form::checkbox('modify_all','0',false,array('id'=>'modify_all','onclick'=>'all_modify(this.value)')) !!}</td>
            <td>{!! Form::checkbox('delete_all','0',false,array('id'=>'delete_all','onclick'=>'all_delete(this.value)')) !!}</td>
        </tr>


        @foreach ($modules as $module)   
        <tr>
        <td>{{ $module->description }}</td>
        <td>
        {{ Form::checkbox('view'.$module->id,$arr_view_arr[$module->id]['valueView'.$module->id],false,array('id'=>$arr_view_arr[$module->id]['idview'.$module->id],$arr_view_arr[$module->id]['checkedview'.$module->id],'onclick'=>$arr_view_arr[$module->id]['onclick'.$module->id])) }} </td>
        <td>
        {{ Form::checkbox('save'.$module->id,$arr_save_arr[$module->id]['valueSave'.$module->id],false,array('id'=>$arr_save_arr[$module->id]['idsave'.$module->id],$arr_save_arr[$module->id]['checkedsave'.$module->id],'onclick'=>$arr_save_arr[$module->id]['onclick'.$module->id])) }} 
        </td>
        <td>{{ Form::checkbox('modify'.$module->id,$arr_modify_arr[$module->id]['valueModify'.$module->id],false,array('id'=>$arr_modify_arr[$module->id]['idmodify'.$module->id],$arr_modify_arr[$module->id]['checkedmodify'.$module->id],'onclick'=>$arr_modify_arr[$module->id]['onclick'.$module->id])) }} </td>
        <td>{{ Form::checkbox('delete'.$module->id,$arr_delete_arr[$module->id]['valueDelete'.$module->id],false,array('id'=>$arr_delete_arr[$module->id]['iddelete'.$module->id],$arr_delete_arr[$module->id]['checkeddelete'.$module->id],'onclick'=>$arr_delete_arr[$module->id]['onclick'.$module->id])) }}</td>
        </tr>
        @endforeach
    </table>


  {!! Form::close() !!} 

@endsection
<script>

        function changeValue(valor,checkbox){
            if(valor==0){
                $('#'+checkbox).val(1);
            }else{
                $('#'+checkbox).val(0);
            }
        }

        function all_view(valor){
        var count=0;
        count=$('#count_mod').val();

        if(valor==0){
            for(con=1;con<=count;con++){
                $('#view'+con).prop('checked', true);
                $('#view'+con).val(1);
            }
            $('#view_all').val(1);
        }
        if(valor==1){
            for(con=1;con<=count;con++){
                $('#view'+con).prop('checked',false);
                $('#view'+con).val(0);
            }
            $('#view_all').val(0);
        }

    }

    function all_save(valor){
        var count=0;
        count=$('#count_mod').val();

        if(valor==0){
            for(con=1;con<=count;con++){
                $('#save'+con).prop('checked', true);
                $('#save'+con).val(1);
            }
            $('#save_all').val(1);
        }
        if(valor==1){
            for(con=1;con<=count;con++){
                $('#save'+con).prop('checked',false);
                $('#save'+con).val(0);
            }
            $('#save_all').val(0);
        }

    }

    function all_modify(valor){
        var count=0;
        count=$('#count_mod').val();

        if(valor==0){
            for(con=1;con<=count;con++){
                $('#modify'+con).prop('checked', true);
                $('#modify'+con).val(1);
            }
            $('#modify_all').val(1);
        }
        if(valor==1){
            for(con=1;con<=count;con++){
                $('#modify'+con).prop('checked',false);
                $('#modify'+con).val(0);
            }
            $('#modify_all').val(0);
        }

    }

    function all_delete(valor){
        var count=0;
        count=$('#count_mod').val();

        if(valor==0){
            for(con=1;con<=count;con++){
                $('#delete'+con).prop('checked', true);
                $('#delete'+con).val(1);
            }
            $('#delete_all').val(1);
        }
        if(valor==1){
            for(con=1;con<=count;con++){
                $('#delete'+con).prop('checked',false);
                $('#delete'+con).val(0);
            }
            $('#delete_all').val(0);
        }

    }
</script>
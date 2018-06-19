@extends('layouts.app')

@section('main-content')
<div class="row">
    <style type="text/css">
        .content-wrapper{
            min-height: 0px;
        }
    </style>
    <div class="col-lg-12 margin-tb">  
        <div class="pull-left">
            @section('contentheader_title')
            Prescrever medicamento
            @endsection 
            
        </div>
    </div>
</div>

@if (count($errors) > 0)
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<br>
<div class="box box-primary" style="margin-left: 2%; margin-right: 2%; width: 96%;">
    <div class="row">
     <vc-prescricao data="{{$dataprescricao}}" medico="{{$medico}}"  medicamentosss="{{ json_encode($results)}}" ></vc-prescricao>
    </div>
</div>
@endsection
<script src = "{{ asset('js/jquery-3.1.0.js') }}"></script>
<script src = "{{ asset('js/jquery.maskedinput.js') }}" type = "text/javascript" ></script>
<script src = "{{ asset('js/jquery-ui-1.12.0/jquery-ui.js') }}" type = "text/javascript" ></script>

<script src="{{ asset('plugins/datatables/jquery.dataTables.js') }}" type = "text/javascript"></script>
<script src="{{ asset('plugins/datatables/dataTables.bootstrap.min.js') }}"></script>


<script>
$(function ($) {
    $('#table').DataTable({
        "paging": false,

        "search": true,
        "ordering": true,
        "info": false,
        "autoWidth": true,
        "iDisplayLength": 10,
        "scrollY": "100px",
        "bInfo" : false,
        "bSort" : false,
        "columnDefs": [{
                "targets": 'no-sort',
                "orderable": false,
            }]
    });
});


$('a').on('click', function(){
    $('a').removeClass('selected');
    $(this).addClass('selected');
});

</script>


<script>
    @if (Session::get('success'))
            $(function () {
                var msg = "{{Session::get('success')}}"
                swal({
                    title: '',
                    text: msg,
                    confirmButtonColor: "#66BB6A",
                    type: "success",
                    html: true
                });
            });
    @endif
</script>

<style type="text/css">
        .content-wrapper{
            min-height: 0px;
        }
</style>

@extends('layouts.app')
<script src = "{{ asset('js/jquery-3.1.0.js') }}" type = "text/javascript" ></script>
<script src = "{{ asset('js/jquery.maskedinput.js') }}" type = "text/javascript" ></script>
<script src = "{{ asset('js/jquery-ui-1.12.0/jquery-ui.js') }}" type = "text/javascript" ></script>
<link href="{{ asset('js/jquery-ui-themes-1.12.0/themes/base/jquery-ui.css') }}" rel="stylesheet">
<style type="text/css">
    tr{
        cursor: pointer;
    }
</style>
@section('main-content')
<div class="row">
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
     <vc-prescricao data="{{$dataprescricao}}" medico="{{$medico}}"  medicamentosss="{{ json_encode($results)}}" paciente_all="{{ json_encode($paciente)}}" di="{{json_encode($diagnosticos)}}" interacao_all="{{ json_encode($interacoes) }}"></vc-prescricao>
    </div>
</div>
@endsection


<script src="{{ asset('plugins/datatables/jquery.dataTables.js') }}" type = "text/javascript"></script>
<script src="{{ asset('plugins/datatables/dataTables.bootstrap.min.js') }}"></script>




<script>
$(function ($) {
    $('#table2').DataTable({
         ajax: {
        url: '/prescricao/medicamentos',
         dataSrc: 'data'        
    },
    columns: [ { data: 'value' } 

    ],
        

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

    $('#table').DataTable({
        ajax: {
            url: '/pacientes',
                 dataSrc: 'data'        
            },
            columns: [ { data: 'nomecompleto' } 

            ],

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


/*$(function ($) {
    $('#table2').DataTable({
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
});*/

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

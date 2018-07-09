@extends('layouts.app')
<script src = "{{ asset('js/jquery-3.1.0.js') }}" type = "text/javascript" ></script>
<script src = "{{ asset('js/jquery.maskedinput.js') }}" type = "text/javascript" ></script>
<script src = "{{ asset('js/jquery-ui-1.12.0/jquery-ui.js') }}" type = "text/javascript" ></script>
<link href="{{ asset('js/jquery-ui-themes-1.12.0/themes/base/jquery-ui.css') }}" rel="stylesheet">
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

<?php
function data_format($format_ini, $value, $format_end)
{
    $d = \DateTime::createFromFormat($format_ini, $value);
    if ($d)
    {
        return $d->format($format_end);
    }
    return null;
}
?>

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
     <vc-prescricaoedit data="{{$dataprescricao}}" medico="{{$medico}}"  medicamentos="{{$medicamentos }}" pacient="{{$prescricao->internacao->paciente->nomecompleto}}" clinic="{{$prescricao->internacao->clinica->nome}}" leit="{{$prescricao->internacao->leito->leito}}" admissa="<?php echo data_format("Y-m-d",$prescricao->internacao->dataadmissao, "d/m/Y"); ?>" prontua="{{$prescricao->internacao->paciente->numeroprontuario}}" idinter="{{$prescricao->idinternacao}}" evolu="{{$prescricao->evolucao}}" idprescricao={{$idprescricao}} medicamentosss="{{ json_encode($results)}}" di="{{json_encode($diagnosticos)}}" ale="{{$prescricao->internacao->paciente->alergia}}" interacao_all="{{ json_encode($interacoes) }}"></vc-prescricaoedit>
    </div>
</div>
@endsection
<script src="{{ asset('plugins/datatables/jquery.dataTables.js') }}" type = "text/javascript"></script>
<script src="{{ asset('plugins/datatables/dataTables.bootstrap.min.js') }}"></script>


<script>
$(function ($) {
    $('#table').DataTable({
         ajax: {
        url: '/prescricao/medicamentos',
         dataSrc: 'data'        
    },
    columns: [ { data: 'value' } ],
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


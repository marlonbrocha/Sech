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
        @section('contentheader_title')
        <div class="pull-left">
            Internar paciente
        </div>
        @endsection 
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
        <div class="box-body">
            <vc-internacao pa="{{$pacientes}}" le="{{$leitos}}" cli="{{$clinicas}}" ci="{{json_encode($cid10s)}}"></vc-internacao>            
        </div>
    </div>
</div>

<div class="modal fade" id="pacientemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            {!! Form::open(array('route' => 'paciente.store','method'=>'POST')) !!}
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"><strong>Cadastrar paciente</strong></h4>
            </div>
            <div class="modal-body">
                <div class="box box-primary" style="margin-left: 2%; margin-right: 2%; width: 96%;">
                    <div class="row">
                        <div class="box-body">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Nome completo:</strong>
                                    {!! Form::text('nomecompleto', null, array('placeholder' => 'Digite o nome completo do paciente','class' => 'form-control')) !!}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Idade:</strong>
                                    {!! Form::text('idade', null, array('class' => 'form-control')) !!}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Peso:</strong>
                                    {!! Form::text('peso', null, array('class' => 'form-control')) !!}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Alergia:</strong>
                                    {!! Form::textarea('alergia', null, array('class' => 'form-control','rows' => 4)) !!}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Sexo:</strong>
                                    {!!Form::radio('sexo', 'm', true)  !!}M
                                    {!!Form::radio('sexo', 'f') !!}F
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <strong>Nº Prontuário:</strong>
                                    {!! Form::text('numeroprontuario', null, array('class' => 'form-control')) !!}
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                <button type="submit" class="btn btn-primary">Salvar</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>


@endsection
<script src="{{ asset('plugins/datatables/jquery.dataTables.js') }}" type = "text/javascript"></script>
<script src="{{ asset('plugins/datatables/dataTables.bootstrap.min.js') }}"></script>

<script>
$(function ($) {
    $('#table').DataTable({
        ajax: {
            url: '/paciente/pacientes',
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


jQuery(function ($) {
    $("#cpf").mask("999.999.999-99");
});

jQuery(function ($) {
    $("#teste").mask("99.999.999-99");
});

jQuery(function ($) {
    $("#admissao").mask("99/99/9999");
});

$(document).on('click', '.add', function () {
    $("#paciente").modal('show');
});
</script>
<script>
    @if (Session::get('error'))
            $(function () {
                var msg = "{{Session::get('error')}}"
                swal({
                    title: '',
                    text: msg,
                    confirmButtonColor: "#66BB6A",
                    type: "warning",
                    html: true
                });
            });
            @endif
</script>

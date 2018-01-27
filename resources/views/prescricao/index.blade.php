@extends('layouts.app')

<link href="{{ asset('js/jquery-ui-themes-1.12.0/themes/base/jquery-ui.css') }}" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('plugins/datatables/dataTables.bootstrap.css') }}">

@section('main-content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        @section('contentheader_title')
        <div class="pull-left">
            <h2>Prescrições não atendidas</h2>
        </div>
        @endsection
    </div>
</div>
<br>
<div class="box box-primary " style="margin-left: 2%; margin-right: 2%; width: 96%;">
    <div class="box-body">
        <div class="table-responsive col-lg-12 col-md-12 col-sm-12">
            <table id="table" class="table table-bordered table-hover dataTable" role="grid">
                <thead>
                    <tr>
                        <th class="text-center" width="4%">Nº</th>
                        <th class="text-center">Paciente</th>
                        <th class="text-center">Clínica</th>
                        <th class="text-center">Médico</th>
                        <th class="text-center">Data/Hora</th>
                        <th class="text-center no-sort">Opções</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($prescricoesNatendidas  as $key => $prescricao)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $prescricao->internacao->paciente->nomecompleto }}</td>
                        <td>{{ $prescricao->internacao->clinica->nome }}</td>
                        <td>{{ $prescricao->usuario->name }}</td>
                        <td>{{ $prescricao->dataprescricao }}</td>
                        <td width="15%">
                             
                            <a class="btn btn-default" data-target="#{{$prescricao->id}}" data-toggle="modal" title="Visualizar">
                                <i class="fa fa-eye"> </i>
                            </a>
                            @permission('prescricao-edit') 
                            <a class="btn btn-default" title="Abrir" href="{{ route('prescricao.edit',$prescricao->id) }}">
                                <i class="fa fa-folder-open"> </i>
                            </a>
                            <a class="btn btn-default" title="Editar" href="{{ route('prescricao.editar',$prescricao->id) }}">
                                <i class="fa fa-edit"> </i>
                            </a>
                            @endpermission

                            <div class="modal fade" id="{{$prescricao->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="myModalLabel"><strong>Dados da prescrição {{$prescricao->id}}  </strong></h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-xs-12 col-sm-12 col-md-12">
                                                    <strong>Paciente:</strong>
                                                    {{$prescricao->internacao->paciente->nomecompleto}}
                                                    <br><br>
                                                </div>
                                                <div class="col-xs-12 col-sm-12 col-md-12">
                                                    <strong>Clínica:</strong>
                                                    {{$prescricao->internacao->clinica->nome}}
                                                    <br><br>
                                                </div>
                                                <div class="col-xs-12 col-sm-12 col-md-12">
                                                    <strong>Leito:</strong>
                                                    {{$prescricao->internacao->leito->leito}}
                                                    <br><br> 
                                                </div>
                                                <div class="col-xs-12 col-sm-12 col-md-12">
                                                    <strong>Data de nascimento:</strong>
                                                    {{$prescricao->internacao->paciente->nascimento}}
                                                    <br><br> 
                                                </div>
                                                <div class="col-xs-12 col-sm-12 col-md-12">
                                                    <strong>Admissão:</strong>
                                                    {{$prescricao->internacao->dataadmissao}}
                                                    <br><br> 
                                                </div>
                                                <div class="col-xs-12 col-sm-12 col-md-12">
                                                    <strong>Data e hora:</strong>
                                                    {{$prescricao->dataprescricao}}
                                                    <br><br> 
                                                </div>
                                                <div class="col-xs-12 col-sm-12 col-md-12">
                                                    <strong>Diagnóstico:</strong>
                                                    {{$prescricao->internacao->cid10->descricao}}
                                                    <br><br> 
                                                </div>
                                                <div class="col-xs-12 col-sm-12 col-md-12">
                                                    <strong>Evolução:</strong>
                                                    {{$prescricao->evolucao}}
                                                    <br><br> 
                                                </div>
                                                <div class="col-xs-12 col-sm-12 col-md-12">
                                                    <strong>Médico responsável:</strong>
                                                    {{ $prescricao->usuario->name }}
                                                    <br><br> 
                                                </div>
                                                <div class="col-xs-12 col-sm-12 col-md-12">
                                                    <div class="box box-primary" style="margin-left: 2%; margin-right: 2%; width: 96%;">
                                                        <h4><center><b>Medicamentos</b></center></h4>
                                                        <div class="box-body">
                                                            <table id="table" class="table table-bordered table-hover dataTable" role="grid">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Quantidade</th>
                                                                        <th>Nome comercial</th>
                                                                        <th>Posologia</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @foreach ($prescricao->medicamentos  as $key => $prescmed)
                                                                    <tr>
                                                                        <td>{{$prescmed->qtdpedida}}</td>
                                                                        <td>{{$prescmed->medicamento->nomecomercial or ''}}</td>
                                                                        <td>{{$prescmed->posologia}}</td>
                                                                    </tr>
                                                                    @endforeach  
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Prescrições atendidas</h2>
        </div>     
    </div>
</div>
<br>
<div class="box box-primary" style="margin-left: 2%; margin-right: 2%; width: 96%;">
    <div class="box-body">
        <div class="row">
            <div class="box-body">
                <div class="table-responsive col-lg-12 col-md-12 col-sm-12">
                    <table  id="table2" class="table table-bordered table-hover dataTable">
                        <thead>
                            <tr>
                                <th class="text-center" width="4%">Nº</th>
                                <th class="text-center">Paciente</th>
                                <th class="text-center">Clínica</th>
                                <th class="text-center">Médico</th>
                                <th class="text-center">Data/Hora</th>
                                <th class="text-center no-sort">Opções</th>
                            </tr>
                        </thead>
                        <?php $i = 0; ?>
                        @foreach ($prescricoesAtendidas  as $key => $prescricao)
                        <tbody>
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{ $prescricao->internacao->paciente->nomecompleto }}</td>
                                <td>{{ $prescricao->internacao->clinica->nome }}</td>
                                <td>{{ $prescricao->usuario->name }}</td>
                                <td>{{ $prescricao->dataprescricao }}</td>
                                <td width="2%">
                        <center>
                            <a class="btn btn-default" data-target="#{{$prescricao->id}}" data-toggle="modal" title="Visualizar">
                                <i class="fa fa-eye"> </i>
                            </a>
                        </center>

                        <div class="modal fade" id="{{$prescricao->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="myModalLabel"><strong>Dados da clínica: </strong></h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <strong>Paciente:</strong>
                                                {{$prescricao->internacao->paciente->nomecompleto}}
                                                <br><br>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <strong>Clínica:</strong>
                                                {{$prescricao->internacao->clinica->nome}}
                                                <br><br>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <strong>Leito:</strong>
                                                {{$prescricao->internacao->leito->leito}}
                                                <br><br> 
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <strong>Data de nascimento:</strong>
                                                {{$prescricao->internacao->paciente->nascimento}}
                                                <br><br> 
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <strong>Admissão:</strong>
                                                {{$prescricao->internacao->dataadmissao}}
                                                <br><br> 
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <strong>Data e hora:</strong>
                                                {{$prescricao->dataprescricao}}
                                                <br><br> 
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <strong>Diagnóstico:</strong>
                                                {{$prescricao->internacao->cid10->descricao}}
                                                <br><br> 
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <strong>Evolução:</strong>
                                                {{$prescricao->evolucao}}
                                                <br><br> 
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <strong>Médico responsável:</strong>
                                                {{ $prescricao->usuario->name }}
                                                <br><br> 
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class="box box-primary" style="margin-left: 2%; margin-right: 2%; width: 96%;">
                                                    <h4><center><b>Medicamentos</b></center></h4>
                                                    <div class="box-body">
                                                        <table id="table" class="table table-bordered table-hover dataTable" role="grid">
                                                            <thead>
                                                                <tr>
                                                                    <th>Quantidade</th>
                                                                    <th>Nome comercial</th>
                                                                    <th>Posologia</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>

                                                                @foreach ($prescricao->medicamentos  as $key => $prescmed)
                                                                <tr>
                                                                    <td>{{$prescmed->qtdpedida}}</td>
                                                                    <td>{{$prescmed->medicamento->nomecomercial}}</td>
                                                                    <td>{{$prescmed->posologia}}</td>
                                                                </tr>
                                                                @endforeach  
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </td>
                        </tr>
                        @endforeach
                        </tbody> 
                    </table>
                </div>
            </div>
        </div>



        @endsection
        <script src = "{{ asset('js/jquery-3.1.0.js') }}"></script>
        <script src = "{{ asset('js/jquery.maskedinput.js') }}" type = "text/javascript" ></script>
        <script src = "{{ asset('js/jquery-ui-1.12.0/jquery-ui.js') }}" type = "text/javascript" ></script>
        <!-- DataTables -->
        <script src="{{ asset('plugins/datatables/jquery.dataTables.js') }}" type = "text/javascript"></script>
        <script src="{{ asset('plugins/datatables/dataTables.bootstrap.min.js') }}"></script>

        <script>
$(function ($) {
    $('#table').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": true,
        "lengthMenu": [[10, 30, 50, -1], [10, 30, 50, "Todos"]],
        "columnDefs": [{
                "targets": 'no-sort',
                "orderable": false,
            }]
    });
    $('#table2').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": true,
        "lengthMenu": [[10, 30, 50, -1], [10, 30, 50, "Todos"]],
        "columnDefs": [{
                "targets": 'no-sort',
                "orderable": false,
            }]
    });
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


@extends('layouts.app')

<link href="{{ asset('js/jquery-ui-themes-1.12.0/themes/base/jquery-ui.css') }}" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('css/iziToast.min.css')}}">
<link rel="stylesheet" href="{{ asset('plugins/datatables/dataTables.bootstrap.css') }}">

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

@section('main-content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        @section('contentheader_title')
        <div class="pull-left">
            Prescrição
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
<div style="text-align: right; right: 20px">

                                </div>

{!! Form::model($prescricao, ['method' => 'PATCH','route' => ['prescricao.update', $prescricao->id]]) !!}
<div class="box box-primary" style="margin-left: 2%; margin-right: 2%; width: 96%;">
    <div class="row">
        <div class="box-body"> 
            <div class="row">
                <div class="box-body">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Paciente:</strong>
                            {{$prescricao->internacao->paciente->nomecompleto}}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Idade:</strong>
                            {{$prescricao->internacao->paciente->idade}}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Diagnóstico:</strong>
                            <br>
                            @foreach ($diagnosticos as $diag)
                                {{$diag->descricao}}</p>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Clínica:</strong>
                            {{$prescricao->internacao->clinica->nome}}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Leito:</strong>
                            {{$prescricao->internacao->leito->leito}}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Data de admissão:</strong>
                            <?php 
                                echo data_format("Y-m-d",$prescricao->internacao->dataadmissao, "d/m/Y");
                            ?>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Data e hora da prescrição:</strong>
                            {{$prescricao->dataprescricao}}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Evolução:</strong>
                            {{$prescricao->evolucao}}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="box box-primary " style="margin-left: 2%; margin-right: 2%; width: 96%;">
                            <h4><center><b>Descrição dos medicamentos</b></center></h4>
                            <div class="box-body">
                                <div class="table-responsive col-lg-12 col-md-12 col-sm-12">
                                    <table id="table" class="table table-bordered table-hover dataTable" role="grid">
                                        <thead>
                                            <tr>
                                                <th class="text-center">Medicamento</th>
                                                <th class="text-center">Quantidade pedida</th>
                                                <th class="text-center">Posologia</th>
                                                <th class="text-center">Opções</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($medicamentos  as $key => $medicamento)
                                            <tr>
                                                <td> 
                                                    @if($medicamento->idmedicamento  != '')
                                                    @foreach ($medicamento->medicamento->medicamentosubstancias as $key => $medicamentosubstancia)
                                                    {{$medicamentosubstancia->substanciaativa->nome}}
                                                    {{$medicamentosubstancia->quantidadedose}}
                                                    <?php
                                                    $nomeunidade = '';
                                                    switch ($medicamentosubstancia->unidadedose) {
                                                        case 0:
                                                            $nomeunidade = 'mcg';
                                                            break;
                                                        case 1:
                                                            $nomeunidade = 'mg';
                                                            break;
                                                        case 2:
                                                            $nomeunidade = 'g';
                                                            break;
                                                        case 3:
                                                            $nomeunidade = 'UI';
                                                            break;
                                                        case 4:
                                                            $nomeunidade = 'unidades';
                                                            break;
                                                        case 5:
                                                            $nomeunidade = 'mg/g';
                                                            break;
                                                        case 6:
                                                            $nomeunidade = 'UI/g';
                                                            break;
                                                        case 7:
                                                            $nomeunidade = 'mEq/mL';
                                                            break;
                                                        case 8:
                                                            $nomeunidade = 'mg/gota';
                                                            break;
                                                        case 9:
                                                            $nomeunidade = 'mcg/mL';
                                                            break;
                                                        case 10:
                                                            $nomeunidade = 'UI/mL';
                                                            break;
                                                        case 11:
                                                            $nomeunidade = 'mEq';
                                                            break;
                                                    }
                                                    echo"$nomeunidade, ";
                                                    ?>
                                                    @endforeach

                                                    {{ $medicamento->medicamento->formafarmaceuticas->nome}}
                                                    <?php
                                                    $conteudo = '';
                                                    switch ($medicamento->nomeconteudo) {
                                                        case 0:
                                                            $conteudo = 'Frasco';
                                                            break;
                                                        case 1:
                                                            $conteudo = 'FA (frasco ampola)';
                                                            break;
                                                        case 2:
                                                            $conteudo = 'AMP (ampola)';
                                                            break;
                                                        case 3:
                                                            $conteudo = 'Caixa';
                                                            break;
                                                        case 4:
                                                            $conteudo = 'Envelope';
                                                            break;
                                                        case 5:
                                                            $conteudo = 'Tubo';
                                                            break;
                                                        case 6:
                                                            $conteudo = 'Bolsa';
                                                            break;
                                                        case 7:
                                                            $conteudo = 'Pote';
                                                            break;
                                                    }
                                                    echo"$conteudo com $medicamento->quantidadeconteudo";

                                                    $uc = '';
                                                    switch ($medicamento->unidadeconteudo) {
                                                        case 0:
                                                            $uc = 'mcg';
                                                            break;
                                                        case 1:
                                                            $uc = 'mg';
                                                            break;
                                                        case 2:
                                                            $uc = 'g';
                                                            break;
                                                        case 3:
                                                            $uc = 'UI';
                                                            break;
                                                        case 4:
                                                            $uc = 'unidades';
                                                            break;
                                                        case 5:
                                                            $uc = 'mg/g';
                                                            break;
                                                        case 6:
                                                            $uc = 'UI/g';
                                                            break;
                                                        case 7:
                                                            $uc = 'mEq/mL';
                                                            break;
                                                        case 8:
                                                            $uc = 'mg/gota';
                                                            break;
                                                        case 9:
                                                            $uc = 'mcg/mL';
                                                            break;
                                                        case 10:
                                                            $uc = 'UI/mL';
                                                            break;
                                                        case 11:
                                                            $uc = 'mEq';
                                                            break;
                                                    }
                                                    echo"$uc ";
                                                    ?>
                                                                                               
                                                @else
                                                {{$medicamento->outros}}

                                                @endif


                                                </td>
                                                <td>{{ $medicamento->qtdpedida }}</td>
                                                <td>{{ $medicamento->posologia}}</td>
                                                <td>
                                                                            
                                        @if($medicamento->idrelatorio != '')
                                        <center>
                                            <a class="btn btn-default" data-target="#{{$medicamento->idrelatorio}}" data-toggle="modal" title="Relatório Antimicrobiano" id="btn{{$medicamento->idprescmed}}" >
                                                <i class="fa fa-file-text-o"> </i>
                                            </a>
                                        </center>
                                        @endif
                                    </td>
                                        </tr>


                                        <div class="modal fade" id="{{$medicamento->idrelatorio}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                        <h4 class="modal-title" id="myModalLabel"><strong>Relatório de Antibioticoterapia</strong> </h4>

                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                                <strong>Paciente:</strong>
                                                                {{$medicamento->nome}}
                                                                <br><br>
                                                                <strong>Leito:</strong>
                                                                {{$medicamento->leito}}
                                                                <br><br>
                                                                <strong>Data de admissão:</strong>
                                                                <?php 
                                                                    echo data_format("Y-m-d",$medicamento->data_admissao, "d/m/Y");
                                                                ?>
                                                                <br><br>
                                                                <strong>Início do traamento:</strong>
                                                                <?php 
                                                                    echo data_format("Y-m-d",$medicamento->inicio_tratamento, "d/m/Y");
                                                                ?>
                                                                <br><br>
                                                                <strong>Clínica:</strong>
                                                                {{$medicamento->clinica}}
                                                                <br><br>
                                                                <strong>Diagnóstico infeccioso:</strong>
                                                                {{$medicamento->diagnostico_infeccioso}}
                                                                <br><br>
                                                                <strong>Duração do tratamento:</strong>
                                                                {{$medicamento->quantidade}} {{$medicamento->duracao_tratamento}}
                                                                <br><br>
                                                                <strong>Antimicrobiano:</strong>
                                                                {{$medicamento->antimicrobiano}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <a class="btn btn-default" target="_blank" title="Imprimir" href="{{ route('relatorio.antibioticoterapia',$prescricao->id) }}">
                                                        <i class="glyphicon glyphicon-print"> </i></a>
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                                                        
                                                    </div>
                                        
                                                </div>
                                            </div>
                                        </div>

                                        
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>                                                              
                </div>

            </div>

            <div class="pull-right" style="margin-right: 1%;">
                <a class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Voltar" href="{{ route('prescricao.index') }}"><i class="fa fa-reply"></i></a>
            </div>
            <div class="pull-right" style="margin-right: 1%;">
                <a class="btn btn-default" target="_blank" title="Imprimir" href="{{ route('relatorio.prescricao',$prescricao->id) }}"><i class="glyphicon glyphicon-print"></i></a>                
            </div>
        </div>
    </div>
</div>
{!! Form::close() !!}


@endsection


<script src = "{{ asset('js/jquery-3.1.0.js') }}"></script>
<script src = "{{ asset('js/jquery.maskedinput.js') }}" type = "text/javascript" ></script>
<script src = "{{ asset('js/jquery-ui-1.12.0/jquery-ui.js') }}" type = "text/javascript" ></script>
<script src="{{ asset('js/iziToast.min.js')}}" type="text/javascript"></script>
<!-- DataTables -->
<script src="{{ asset('plugins/datatables/jquery.dataTables.js') }}" type = "text/javascript"></script>
<script src="{{ asset('plugins/datatables/dataTables.bootstrap.min.js') }}"></script>


<script>
    function resolver(id){
    $('#' + id).modal('hide');
    $.ajax({
    type: 'patch',
            url: "{{ URL::route('prescricaomedicamento.update') }}",
            data: {
            '_token': $('input[name=_token]').val(),
                    'id': id,
                    'qtdatentida': $('#qtdatendida').val()
            },
            success: function (data) {
            $('#qtd' + id).html(data.qtdatendida);
           
            }
    });
    }
</script>
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
<html>
    <head>
        <meta charset="UTF-8">
        <title>Prescrição Eletrónica</title>
    </head>
    <body>
        <style type="text/css">
            .tg  {border-collapse:collapse;border-spacing:0;}
            .tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;}
            .tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;}
            @media screen and (max-width: 100%)
        </style>
        <table class="tg" style="table-layout: fixed; width: 100%">
            
            <tr>
                <th class="tg-031e" width="10%" >Diagnóstico</th>
                <th  colspan="4" rowspan="2" width="30%">{{$prescricao->internacao->cid10->descricao}}</th>
                <th class="tg-baqh" rowspan="2" colspan="2">História da doença atual</th>
                <th class="tg-yw4l" rowspan="2">{{$prescricao->historicoatual}}</th>
                <th class="tg-031e" rowspan="2" width="8%">Evolução</th>
                <th class="tg-031e" colspan="10" rowspan="2">{{$prescricao->evolucao}}</th>
            </tr>
            <tr>
                <td class="tg-031e"></td>
            </tr>
            <tr>
                <td class="tg-031e">Unidade:</td>
                <td class="tg-yw4l" colspan="4">{{$prescricao->internacao->clinica->nome}}</td>
                <td class="tg-yw4l">Leito: </td>
                <td class="tg-yw4l">{{$prescricao->internacao->leito->leito}}</td>
                <td class="tg-031e" colspan="2">Admissão</td>
                <td class="tg-031e" colspan="3"><?php 
                                echo data_format("Y-m-d",$prescricao->internacao->dataadmissao, "d/m/Y");
                            ?></td>
                <td class="tg-031e" colspan="7">Prescrição e evolução médica</td>
            </tr>
            <tr>
                <td class="tg-031e">Nome do paciente: </td>
                <td class="tg-yw4l" colspan="6">{{$prescricao->internacao->paciente->nomecompleto}}</td>
                <td class="tg-s6z2">idade</td>
                <td class="tg-031e">{{$prescricao->internacao->paciente->nascimento}}</td>
                <td class="tg-031e" colspan="2">hora</td>
                <td class="tg-031e">XX:XX:XX</td>
                <td class="tg-031e">data</td>
                <td class="tg-031e" colspan="6">XX/XX/XXXX</td>
            </tr>
            <tr>
                <td class="tg-s6z2">SIMPAS</td>
                <td  width="1%" >ped</td>
                <td class="tg-yw4l" width="1px">at.</td>
                <td class="tg-yw4l" width="1%">It</td>
                <td class="tg-s6z2" width="30%" colspan="2">Descrição do medicamento</td>
                <td class="tg-baqh" width="30%">Observação</td>
                <td class="tg-baqh" colspan="12">Aprazamento</td>
            </tr>
            @foreach ($medicamentos  as $key => $medicamento)
            <tr>
                <td class="tg-yw4l">{{ $medicamento->simpas }}</td>
                <td class="tg-yw4l" width="1%">{{ $medicamento->qtdpedida }}</td>
                <td class="tg-yw4l" width="1%"></td>
                <td class="tg-yw4l" width="1%"></td>
                <td class="tg-yw4l" colspan="2">
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
                </td>
                <td class="tg-yw4l">{{ $medicamento->obs}}</td>
                <td class="tg-yw4l" width="3%"></td>
                <td class="tg-yw4l" width="3%"></td>
                <td class="tg-yw4l" width="3%"></td>
                <td class="tg-yw4l" width="3%"></td>
                <td class="tg-yw4l" width="3%"></td>
                <td class="tg-yw4l" width="3%"></td>
                <td class="tg-yw4l" width="3%"></td>
                <td class="tg-yw4l" width="3%"></td>
                <td class="tg-yw4l" width="3%"></td>
                <td class="tg-yw4l" width="3%"></td>
                <td class="tg-yw4l" width="3%"></td>
                <td class="tg-yw4l" width="3%"></td>
            </tr>
            @endforeach
        </table>
    </table>
</div>
</body>
</html>
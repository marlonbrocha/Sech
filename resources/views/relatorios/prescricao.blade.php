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

$codigos = array();
$direita = array();
$posicoes = array();
$sub1 = array();
$sub2 = array();
$interacaoes_all = array();

foreach ($interacoes as $value) {
    $sub1[] = $value->idsubstanciaativa1;
    $sub2[] = $value->idsubstanciaativa2;
}

?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Prescrição Eletrónica</title>
    </head>
    <body>
    <div style="text-align: center">
      <img src="{{public_path('img/prado.png')}}" width="460px">
      <img src="{{public_path('img/governo.png')}}" width="200px">
      <img src="{{public_path('img/sus.png')}}" width="200px">
      <img src="{{public_path('img/sesab.png')}}" width="200px">
    </div>
     <div style="text-align: center; margin-top: 50px">
        <h3>PRESCRIÇÃO MÉDICA</h3>
      </div>
        <style type="text/css">
        html {
          height: 100%;
          box-sizing: border-box;
        }

        *,
        *:before,
        *:after {
          box-sizing: inherit;
        }

        body {
          position: relative;
          margin: 0;
          padding-bottom: 6rem;
          min-height: 100%;
          font-family: "Helvetica Neue", Arial, sans-serif;
        }


        .footer {
          position: absolute;
          right: 0;
          bottom: 0;
          left: 0;
          padding: 1rem;
          text-align: center;
        }

            .tg  {border-collapse:collapse;border-spacing:0;}
            .tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;}
            .tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;}
            @media screen and (max-width: 100%)
        </style>
        <table class="tg" style="table-layout: fixed; width: 100%">
            
            <tr>
                <th class="tg-031e" width="10%" rowspan="2" >Diagnóstico</th>
                <th  colspan="4" rowspan="2" width="30%" style="text-align: left;">
                    
                    @foreach($diagnosticos as $key=> $diag)
                    <div>{{++$key}} - {{$diag->descricao}}</div>
                    @endforeach
                </th>
                <th class="tg-031e" rowspan="2" width="8%" colspan="4">Evolução</th>
                <th class="tg-031e" colspan="4" rowspan="2">{{$prescricao->evolucao}}</th>
                <th class="tg-031e" rowspan="2" width="3%" colspan="4">Obs</th>
                <th class="tg-031e" rowspan="2" colspan="3">{{$prescricao->observacoesmedicas}}</th>
            </tr>
            <tr>
                
            </tr>
            <tr>
                <td class="tg-031e">Unidade:</td>
                <td class="tg-yw4l" colspan="4">{{$prescricao->internacao->clinica->nome}}</td>
                <td class="tg-yw4l" colspan="2">Leito: </td>
                <td class="tg-yw4l">{{$prescricao->internacao->leito->leito}}</td>
                <td class="tg-031e" colspan="2">Admissão</td>
                <td class="tg-031e" colspan="2"><?php 
                                echo data_format("Y-m-d",$prescricao->internacao->dataadmissao, "d/m/Y");
                            ?></td>
                <td class="tg-031e" colspan="3">Prontuário</td>
                <td class="tg-031e" colspan="5">{{$prescricao->internacao->paciente->numeroprontuario}}</td>                                                        
            </tr>
            <tr>
                <td class="tg-031e">Nome do paciente: </td>
                <td class="tg-yw4l" colspan="6">{{$prescricao->internacao->paciente->nomecompleto}}</td>
                <td class="tg-s6z2" colspan="2">Idade</td>
                <td class="tg-031e">{{$prescricao->internacao->paciente->idade}}</td>
                <td class="tg-031e" colspan="1">Peso</td>
                <td class="tg-031e" colspan="2">{{$prescricao->internacao->paciente->peso}}</td>
                <td class="tg-031e" colspan="6">Data da prescrição</td>
                <td class="tg-031e" colspan="1"><?php echo date("d/m/Y ") ?></td>
            </tr>
            <tr>
                <td>Alergia(s)</td>
                <td colspan="19">{{$prescricao->internacao->paciente->alergia}}</td>
            </tr>
        </table>
            <table class="tg" style="table-layout: fixed; width: 100%; margin-top: -1px">
                <tr>
                    <td class="tg-s6z2" width="10%">SIMPAS</td>
                    <td width="3.5%">Ped</td>
                    <td class="tg-yw4l" width="3.5%">At.</td>
                    <td class="tg-s6z2"  colspan="2" width="25%">Descrição do medicamento</td>
                    <td class="tg-baqh"  colspan="2" width="35.3%" >Posologia</td>
                    <td class="tg-baqh" width="6.9%" colspan="2" >Tempo de tratamento</td>
                    <td class="tg-baqh" colspan="5">Aprazamento</td>
                </tr>
            </table>
            <table class="tg" style="table-layout: fixed; width: 100%; margin-top: -1px">
            @foreach ($medicamentos  as $key => $medicamento)
            <tr>
                <td class="tg-s6z2" width="10%" style="font-size: 11px">{{ $medicamento->simpas }}</td>
                <td class="tg-yw4l" width="3.5%">{{ $medicamento->qtdpedida }}</td>
                <td class="tg-yw4l" width="3.5%"></td>
                <td class="tg-yw4l" colspan="2" width="25%">

                    @if($medicamento->idmedicamento != null)
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
                <td class="tg-yw4l" colspan="9">{{$medicamento->dose}}. {{$medicamento->administracao}}.{{ $medicamento->obs}}. {{$medicamento->diluicao}} </td>
                <td class="tg-yw4l" width="7%">{{$medicamento->posologia}}{{$medicamento->intervalo_posologia   }}</td>
                <td class="tg-yw4l" width="2.7%"></td>
                <td class="tg-yw4l" width="2.7%"></td>
                <td class="tg-yw4l" width="2.7%"></td>
                <td class="tg-yw4l" width="2.7%"></td>
                <td class="tg-yw4l" width="2.7%"></td>
                <td class="tg-yw4l" width="2.7%"></td>
            </tr>
            @endforeach
                        
                    @foreach ($medicamentos  as $key => $medicamento)
                    @if($medicamento->idmedicamento != null)
                    @foreach ($medicamento->medicamento->medicamentosubstancias as $key => $medicamentosubstancia)
                        <?php 
                    $cod = $medicamentosubstancia->substanciaativa->codigo;
                            $verifica = false;
                            $codigos[] = ['cod' => $cod, 'med' => $medicamentosubstancia->substanciaativa->nome];

                            if(count($direita) > 0){ //vefifica se ja tem interacaoes inseridas
                                for ($i = 0; $i < count($direita) ; $i++){ 
                                    if($cod == $direita[$i]['sub']){  //comparação do codigo inserido com o vetor existente 
                                        for($j = 0; $j < count($codigos) ; $j++){  
                                            if($direita[$i]['sub'] == $codigos[$j]['cod']){          
                                                $med = $direita[$i]['med'];
                                                $verifica = true;
                                            }
                                        }
                                        if($verifica == true && count($codigos) > 1){
                                            $interacaoes_all[] = $med;
                                            $interacaoes_all[] = $medicamentosubstancia->substanciaativa->nome;                                              
                                        }    
                                    }
                                }
                            }                    

                            for ($i = 0; $i < count($sub1) ; $i++){
                                if($cod == $sub1[$i]){
                                    $direita[] = ['med' =>  $medicamentosubstancia->substanciaativa->nome,'sub' => $sub2[$i], 'id' => $cod];
                                    $posicoes[] = ['pos' => $i, 'id:' => $cod];
                                }
                            }

                            for ($i = 0; $i < count($sub2) ; $i++){
                                if($cod == $sub2[$i]){
                                    $direita[] = ['med' =>  $medicamentosubstancia->substanciaativa->nome,'sub' => $sub1[$i], 'id'=> $cod];
                                    $posicoes[] = ['pos' => $i, 'id:' => $cod];
                                }
                            }
                     ?>
                     @endforeach
                     @endif
                     @endforeach
                     
               <?php if(count($interacaoes_all) > 0){ ?>        
            <tr>
                    <td>Interacões medicamentosas</td>
                    <td colspan="20">
                    <?php $cont = 1; for ($i=0; $i < count($interacaoes_all); $i++) { 
                        
                        if($cont == 2){
                            echo '('.$interacaoes_all[$i-1].' + '.$interacaoes_all[$i].') ';    
                        }
                        $cont++;
                    } ?>  
                     </td>
            </tr>
        <?php } ?>
            
            
            </table>
       
<div class="footer">Rua São Cristóvão, S/n - Centro, Jequié - BA, 45203-110</div>


</body>
</html>
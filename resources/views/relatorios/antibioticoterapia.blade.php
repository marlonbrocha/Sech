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

<style type="text/css">
      .tg  {border-collapse:collapse;border-spacing:0; width: 100%;}
          .tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 20px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;}
          .tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 20px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;}
          .tg .tg-q19q{font-size:16px;vertical-align:top}
          .tg .tg-ox40{font-weight:bold;font-size:14px;text-align:left;vertical-align:top;}
      .tc  {border-collapse:collapse;border-spacing:0; width: 70%;margin-left: 120px}
          .tc td{font-family:Arial, sans-serif;font-size:14px;padding:10px 20px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;}
          .tc th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 20px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;}
          .tc .tc-q19q{font-size:16px;vertical-align:top}
          .tc .tc-qt{font-size:16px;vertical-align:top;text-align: center;}
          .tc .tc-ox40{font-weight:bold;font-size:14px;text-align:left;vertical-align:top;}
</style>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>ANTIBIOTICOTERAPIA</title>        
    </head>
<body>
    <div>
    	<h3>SOLICITAÇÃO DE ANTIBIOTICOTERAPIA DE USO RESTRITO</h3>
		<img src="{{public_path('img/sus.png')}}" width="200px">

		@foreach($medicamentos  as $key => $medicamento)
		<h4>DADOS DO PACIENTE</h4>	
		<h5>Nome Completo: {{$medicamento->nome}}</h5>
		<h5>Leito: {{$medicamento->leito}}</h5>
		<h5>Data de Admissão: <?php 
            echo data_format("Y-m-d",$medicamento->data_admissao, "d/m/Y");
        ?></h5>
        <h5>Início do traamento: 
        <?php 
            echo data_format("Y-m-d",$medicamento->inicio_tratamento, "d/m/Y");
        ?></h5>
		<h5>Clínica: {{$medicamento->clinica}}</h5>
		<h5>Diagnóstico infeccioso: 
        {{$medicamento->diagnostico_infeccioso}}</h5>
        <h5>Duração do tratamento: 
        {{$medicamento->duracao_tratamento}}</h5>
        <h5>Antimicrobiano: 
        {{$medicamento->antimicrobiano}}</h5>
		@endforeach	
		
</div>
</body>
</html>
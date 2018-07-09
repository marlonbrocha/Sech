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

#tudo {
  padding-top: 100px;
  text-align: center;
  padding-bottom: 50px;
}
#tudo1 {
  text-align: center;
  position:relative;
  width: 300px;
  float: left;
  padding-left: 80px;
  padding-right: 150px;

}
#tudo2 {
  text-align: center;
  position: relative;
  width: 300px;
  float: left;
}


  h5{
   font-size: 15px; 
   margin-bottom: -5px
  }
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

    <div style="text-align: center">
      <img src="{{public_path('img/governo.png')}}" width="200px">
      <img src="{{public_path('img/sus.png')}}" width="200px">
      <img src="{{public_path('img/sesab.png')}}" width="200px">
    </div>
      <div style="text-align: center; margin-top: 50px">
      	<h3>SOLICITAÇÃO DE ANTIBIOTICOTERAPIA DE USO RESTRITO</h3>
      </div>
      <table class="tg" style="margin-top: 60px;">  
    		@foreach($medicamentos  as $key => $medicamento)
    		<tr><td colspan="4"><h5>NOME DO PACIENTE: </h5></td></tr>
        <tr><td class="tg-q19q" colspan="4">{{$medicamento->nome}}</td></tr>
    		<tr><td><h5>Leito:</h5></td><td><h5>DATA DE ADMISSÃO:</h5></td> <td><h5>INÍCIO DO TRATAMENTO:</h5></td><td><h5>CLÍNICA</h5></td></tr>
        <tr>
        <td class="tg-q19q">{{$medicamento->leito}} </td>
        <td><?php echo data_format("Y-m-d",$medicamento->data_admissao, "d/m/Y"); ?></td>
        <td><?php echo data_format("Y-m-d",$medicamento->inicio_tratamento, "d/m/Y"); ?></td>
        <td> {{$medicamento->clinica}}</td>
    		</tr>
      </table>   

      <table class="tg" style="margin-top: 30px">
    		<tr><td><h5>DIAGNÓSTICO INFECCIOSO:</h5></td></tr>
        <tr><td>{{$medicamento->diagnostico_infeccioso}}</td></tr>
      </table>

      <table class="tg" style="margin-top: 30px">
        <tr><td><h5>DURAÇÃO DO TRATAMENTO: </h5></td></tr>
        <tr><td>{{$medicamento->duracao_tratamento}} Dia(s)</td></tr>
      </table>

      <table class="tg" style="margin-top: 30px">
        <tr><td><h5>ANTIMICROBIANO:</h5></td></tr>            
        <tr><td>{{$medicamento->antimicrobiano}}</td></tr>
      </table>            
    		@endforeach	

        <div id="tudo">
  <div id="tudo1">
    ___________________________________<br><br>
          Farmacêutico Responsável da CCIH
  </div>
    <div id="tudo2">
      ___________________________________<br><br>
          Presidente da CCIH
    </div>
</div>
<br><br><br><br>
        <div style="text-align: center; ">
          __________________________________ <br><br>
              Médico Responsável da CCIH 
        </div>
</div>
</body>
</html>
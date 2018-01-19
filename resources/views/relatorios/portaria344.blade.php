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
        <title>Portaria 344</title>
    </head>
<body>
    <div>
		<table class="tg">
			<tr>
				<th class="tg-q19q">Medicamento</th>
				<th class="tg-q19q">Nome da Clínica</th>	
				<th class="tg-q19q">Quantidade Pedida</th>

			</tr>
		<?php $total =0; ?>	
		@foreach($portarias as $por)
		<?php $total += $por->qtdpedida; ?>
			<tr>	
				<td class="tg-q19q">{{$por->nome_medicamento}}</td>
				<td class="tg-q19q">{{$por->nome_clinica}}</td>
				<td class="tg-q19q">{{$por->qtdpedida}}</td>
			</tr>			
		@endforeach
			<tr>
				<td></td>
				<td style="font-weight: bold;">Total</td>
				<td>{{$total}}</td>
			</tr>	
		</table>
</div>
</body>
</html>
<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RelatorioAntimicrobiano extends Model
{

	public $fillable = ['nome','leito','data_admissao','inicio_tratamento','clinica','diagnostico_infeccioso','duracao_tratamento','antimicrobiano','idprescricao_medicamento'];


}

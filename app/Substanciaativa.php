<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Substanciaativa extends Model
{
    public $fillable = ['codigo','nome', 'classificacao', 'contraindicacao','dose','administracao','diluicao','estabilidade'];
    
}


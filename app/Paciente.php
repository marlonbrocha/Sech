<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    public $fillable = ['nomecompleto', 'sexo', 'numeroprontuario','peso','idade', 'alergia'];
}

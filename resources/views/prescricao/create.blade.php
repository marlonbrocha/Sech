@extends('layouts.app')

@section('main-content')
<div class="row">
    <div class="col-lg-12 margin-tb">  
        <div class="pull-left">
            @section('contentheader_title')
            Prescrever medicamento
            @endsection 
            
        </div>
    </div>
</div>

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
<div class="box box-primary" style="margin-left: 2%; margin-right: 2%; width: 96%;">
    <div class="row">
     <vc-prescricaoedit data="{{$dataprescricao}}" medico="{{$medico}}"  medicamentos="{{$medicamentos }}" pacient="{{$prescricao->internacao->paciente->nomecompleto}}" clinic="{{$prescricao->internacao->clinica->nome}}" leit="{{$prescricao->internacao->leito->leito}}" admissa="<?php echo data_format("Y-m-d",$prescricao->internacao->dataadmissao, "d/m/Y"); ?>" diagnostic="{{$prescricao->internacao->cid10->descricao}}" prontuario="{{$prescricao->internacao->paciente->numeroprontuario}}" ></vc-prescricaoedit>
    </div>
</div>
@endsection
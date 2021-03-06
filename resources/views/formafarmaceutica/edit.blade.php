@extends('layouts.app')
 
@section('main-content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        @section('contentheader_title')
        <div class="pull-left">
            <h2>Editar forma farmacêutica</h2>
        </div>
        @endsection 
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('formafarmaceutica.index') }}"> Voltar</a>
        </div>
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
{!! Form::model($formafarmaceutica, ['method' => 'PATCH','route' => ['formafarmaceutica.update', $formafarmaceutica->id]]) !!}
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Forma farmacêutica:</strong>
            {!! Form::text('nome', null, array('placeholder' => 'Digite o nome da forma farmacêutica','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Unidade de medida::</strong>
            {!!Form::select('unidade', array(0 => 'mcg', 
                                                     1 => 'mg', 
                                                     2 => 'g', 
                                                     3 => 'UI', 
                                                     4 => 'unidades', 
                                                     5 => 'mg/g', 
                                                     6 => 'UI/g', 
                                                     7 => 'mEq/mL', 
                                                     8 => 'mg/gota', 
                                                     9 => 'mcg/mL', 
                                                     10 => 'UI/mL', 
                                                     11 => 'mEq',
                                                     12 => 'mg/mL',
                                                     13 => 'mL'
                                                     )
                    ,null, array('placeholder'=>'--Selecione--','class' => 'form-control'))!!}</div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary">Salvar</button>
    </div>
</div>
{!! Form::close() !!}
@endsection
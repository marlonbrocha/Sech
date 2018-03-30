@extends('layouts.app')
 
@section('main-content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        @section('contentheader_title')
        <div class="pull-left">
            <h2>Editar substância ativa</h2>
        </div>
        @endsection 
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('substanciaativa.index') }}"> Voltar</a>
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
{!! Form::model($substanciaativa, ['method' => 'PATCH','route' => ['substanciaativa.update', $substanciaativa->id]]) !!}
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Substância ativa:</strong>
            {!! Form::text('nome', null, array('placeholder' => 'Ex.: Ambroxol ','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Classificação:</strong>
                {!!Form::select('classificacao', array(0 => 'Controlado da portaria 344/98', 
                                                        1 => 'Potencialmente perigosos', 
                                                        2 => 'Antibiótico de uso restrito', 
                                                        3 => 'Antibiótico', 
                                                        4 => 'Outros'
                                                        )
                ,null, array('placeholder'=>'--Selecione--','class' => 'form-control'))!!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Contraindicação:</strong>
            {!! Form::textarea('contraindicacao', null, array('placeholder' => '','class' => 'form-control', 'style'=>'height:100px', 'maxlength'=>'255')) !!}
        </div>
    </div>

    <div class="col-xs-8 col-sm-8 col-md-8">
                <div class="form-group">
                     <strong>Dose:</strong>
                    {!! Form::textarea('dose', null, array('class' => 'form-control', 'style'=>'height:60px', 'maxlength'=>'254')) !!}
                </div>
            </div>

            <div class="col-xs-8 col-sm-8 col-md-8">
                <div class="form-group">
                     <strong>Administração:</strong>
                    {!! Form::textarea('administracao', null, array('class' => 'form-control', 'style'=>'height:60px', 'maxlength'=>'254')) !!}
                </div>
            </div>

            <div class="col-xs-8 col-sm-8 col-md-8">
                <div class="form-group">
                     <strong>Diluição:</strong>
                    {!! Form::textarea('diluicao', null, array('class' => 'form-control', 'style'=>'height:60px', 'maxlength'=>'254')) !!}
                </div>
            </div>

            <div class="col-xs-8 col-sm-8 col-md-8">
                <div class="form-group">
                     <strong>Estabilidade:</strong>
                    {!! Form::textarea('estabilidade', null, array('class' => 'form-control', 'style'=>'height:60px', 'maxlength'=>'254')) !!}
                </div>
            </div>
            

    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary">Salvar</button>
    </div>
</div>
{!! Form::close() !!}
@endsection
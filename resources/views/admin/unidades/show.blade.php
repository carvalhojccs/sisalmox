@extends('adminlte::page')
@section('content_header')
<h1>{{ $titulo }}</h1>
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Início</a></li>
    <li><a href="{{ route('unidades.index') }}">Unidades</a></li>
    <li class="active"><a href="#">Detalhes</a></li>
</ol>
@stop
@section('content')
<div class="content row">
    <div class="box box-primary">
        <div class="box-body">
            <div class="form-group">
                {{ Form::label('nome','Unidade:') }}
                {{ Form::text('nome',$data->nome,['class' => 'form-control', 'disabled']) }}
            </div>
            <div class="form-group">
                {{ Form::label('sigla','Sigla:') }}
                {{ Form::text('sigla',$data->sigla,['class' => 'form-control', 'disabled']) }}
            </div>
            <div class="form-group">
                {{ Form::label('data_cadastro','Cadastrado em:') }}
                {{ Form::text('data_cadastro',$data->created_at->format('d/m/Y'),['class' => 'form-control', 'disabled']) }}
            </div>
            <a href="{{ route('unidades.edit', $data->id) }}" class="btn btn-primary"><i class="fa fa-edit">&nbsp;</i>Editar</a>
            <a href="{{ route('unidades.destroy', $data->id) }}" class="btn btn-danger"><i class="fa fa-trash">&nbsp;</i>Deletar</a>
        </div>
    </div>
</div>
@stop
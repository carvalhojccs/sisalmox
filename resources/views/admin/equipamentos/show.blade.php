@extends('adminlte::page')
@section('content_header')
<h1>{{ $titulo }}</h1>
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i>Início</a></li>
    <li><a href="{{ route('equipamentos.index') }}">Equipamentos</a></li>
    <li class="active">Equipamentos</li>
</ol>
@stop
@section('content')
<div class="content row">
    <div class="box box-primary">
        <div class="box-body">
            <div class="form-group">
                {{ Form::label('nome','Nome do Euipamento:') }}
                {{ Form::text('nome',$data->nome,['class' => 'form-control','disabled']) }}
            </div>
            <div class="form-group">
                {{ Form::label('data_cadastro','Cadastrado em:') }}
                {{ Form::text('data_cadastro',$data->created_at->format('d/m/Y'),['class' => 'form-control','disabled']) }}
            </div>
            
            {{ Form::open(['route' => ['equipamentos.destroy',$data->id],'class' => 'form', 'method' => 'DELETE']) }}
            <a href="{{ route('equipamentos.edit',$data->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-edit">&nbsp;</i>Editar</a>
            <button class="btn btn-danger btn-sm" onclick="return confirm('Deletar equipamento {{$data->nome}}?')"><i class="fa fa-trash">&nbsp;</i>Deletar</button>
            <a href="{{ route('equipamentos.index') }}" class="btn btn-sm btn-primary"><i class="fa fa-backward">&nbsp;</i>Voltar</a>
            {{ Form::close() }}
        </div>
    </div>
</div>
@stop
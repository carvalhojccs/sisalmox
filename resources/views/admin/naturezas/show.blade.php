@extends('adminlte::page')
@section('content_header')
<h1>{{ $titulo }}</h1>
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard">Início</i></a></li>
    <li><a href="{{ route('naturezas.index') }}">Natureza</a></li>
    <li class="active">Detalhe</li>
</ol>
@stop
@section('content')
<div class="content row">
    <div class="box box-primary">
        <div class="box-body">
            <div class="form-group">
                {{ Form::label('codigo','Código:') }}
                {{ Form::text('codigo',$data->codigo,['class' => 'form-control','disabled']) }}
            </div>
            <div class="form-group">
                {{ Form::label('descricao','Descrição:') }}
                {{ Form::text('descricao',$data->descricao,['class' => 'form-control','disabled']) }}
            </div>
            <div class="form-group">
                {{ Form::label('data_cadastro','Cadastrado em:') }}
                {{ Form::text('data_cadastro',$data->created_at->format('d/m/Y'),['class' => 'form-control','disabled']) }}
            </div>
            
            {{ Form::open(['route' => ['naturezas.destroy', $data->id],'class' => 'form','method' => 'DELETE']) }}
                <a href="{{ route('naturezas.edit', $data->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit">&nbsp;</i>Editar</a>
                <button class="btn btn-danger btn-sm" onclick="return confirm('Deletar natureza {{$data->codigo}}?')"><i class="fa fa-trash"></i> Deletar</button>
                <a href="{{route('naturezas.index')}}" class="btn btn-primary btn-sm"> <i class="fa fa-backward"></i> Voltar</a>
                {{ Form::close() }}
        </div>
    </div>
</div>
@stop
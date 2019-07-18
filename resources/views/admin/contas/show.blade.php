@extends('adminlte::page')
@section('content_header')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard">&nbsp;</i>Dashboard</a></li>
        <li class="breadcrumb-item" ><a href="{{ route(request()->segment(2).'.index') }}">{{ ucfirst(request()->segment(2)) }}</a></li>
        <li class="breadcrumb-item active" aria-current="page">Detalhes</li>
    </ol>
</nav>
@stop
@section('content')
<div class="content row">
    <div class="box box-primary">
        <div class="box-body">
            <div class="form-group">
                {{ Form::label('codigo','Código da conta:') }}
                {{ Form::text('codigo',$data->codigo,['class' => 'form-control','disabled']) }}
            </div>
            <div class="form-group">
                {{ Form::label('nome','Nome da conta:') }}
                {{ Form::text('nome',$data->nome,['class' => 'form-control','disabled']) }}
            </div>
            <div class="form-group">
                {{ Form::label('data_cadastro','Cadastrado em:') }}
                {{ Form::text('data_cadastro',$data->created_at->format('d/m/Y'),['class' => 'form-control','disabled']) }}
            </div>
            <div class="form-group">
                {{ Form::label('conta_natureza','Naturezas de despesas vinculadas:') }}
                @foreach ($data->naturezas as $natureza)
                {{ Form::text('conta_natureza',$natureza->codigo,['class' => 'form-control','disabled']) }}
                <br>
                @endforeach
            </div>
            @include('admin.componentes.form_btn_show')
        </div>
    </div>
</div>
@stop
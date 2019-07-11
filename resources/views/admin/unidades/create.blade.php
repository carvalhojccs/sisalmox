@extends('adminlte::page')
@section('content_header')
<h1>{{ $titulo }}</h1>
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i>Início</a></li>
    <li><a href="{{ route('unidades.index') }}">Unidades</a></li>
    <li class="active"><a href="#">Cadastrar</a></li>
</ol>
@stop
@section('content')
<div class="content row">
    <div class="box box-primary">
        <div class="box box-body">
            @include('admin.includes.alerts')
            {{ Form::open(['route' => 'unidades.store','class' => 'form']) }}
                @include('admin.unidades.partials.form')
            {{ Form::close() }}
        </div>
    </div>
</div>
@stop
@extends('adminlte::page')
@section('content_header')
<h1>{{ $titulo }}</h1>
<ol class="breadcrumb">
        <li><a href="#">Início</a></li>
        <li><a href="{{ route('naturezas.index') }}">Natureza</a></li>
        <li class="active">Editar</li>
    </ol>
@stop
@section('content')
<div class="content row">
    <div class="box box-primary">
        <div class="box-body">
            @include('admin.includes.alerts')
            {{ Form::model($data, ['route' => ['naturezas.update', $data->id], 'class' => 'form']) }}
                @method('PUT')
                @include('admin.naturezas.partials.form')
            {{ Form::close() }}
        </div>
    </div>
</div>
@stop

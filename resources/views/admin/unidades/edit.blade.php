@extends('adminlte::page')
@section('content_header')
    <h1>
        Editar Unidae: {{ $data->nome }}
    </h1>

    <ol class="breadcrumb">
        <li><a href="#">Início</a></li>
        <li><a href="{{ route('unidades.index') }}">Unidades</a></li>
        <li><a href="#" class="active">Editar</a></li>
    </ol>
@stop
@section('content')
<div class="content row">
    <div class="box box-primary">
        <div class="box-body">
            @include('admin.includes.alerts')
            {{ Form::model($data, ['route' => ['unidades.update', $data->id], 'class' => 'form']) }}
                @method('PUT')
                @include('admin.unidades.partials.form')
            {{ Form::close() }}
        </div>
    </div>
</div>
@stop

@extends('adminlte::page')
@section('content_header')
    <h1>
        Editar Equipamento: {{ $data->nome }}

    <ol class="breadcrumb">
        <li><a href="#">Início</a></li>
        <li><a href="{{ route('equipamentos.index') }}">Equipamentos</a></li>
        <li><a href="#" class="active">Editar</a></li>
    </ol>
@stop
@section('content')
<div class="content row">
    <div class="box box-primary">
        <div class="box-body">
            @include('admin.includes.alerts')
            {{ Form::model($data, ['route' => ['equipamentos.update', $data->id], 'class' => 'form']) }}
                @method('PUT')
                @include('admin.equipamentos.partials.form')
            {{ Form::close() }}
        </div>
    </div>
</div>
@stop

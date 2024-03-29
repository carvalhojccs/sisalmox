@extends('adminlte::page')
@section('content_header')
@include('admin.componentes.componente_breadcrumb_show')
@stop
@section('content')
<div class="content row">
    <div class="box box-primary">
        <div class="box-body">
            <div class="form-group">
                {{ Form::label('nome','Nome do armazem:') }}
                {{ Form::text('nome',$data->nome,['class' => 'form-control','disabled']) }}
            </div>
            <div class="form-group">
                {{ Form::label('sigla','Sigla do armazem:') }}
                {{ Form::text('sigla',$data->sigla,['class' => 'form-control','disabled']) }}
            </div>
            <div class="form-group">
                {{ Form::label('data_cadastro','Cadastrado em:') }}
                {{ Form::text('data_cadastro',$data->created_at->format('d/m/Y'),['class' => 'form-control','disabled']) }}
            </div>
            @include('admin.componentes.form_btn_show')
        </div>
    </div>
</div>
@stop
@extends('adminlte::page')
@section('content_header')
@include('admin.componentes.componente_breadcrumb_show')
@stop
@section('content')
<div class="content row">
    <div class="box box-primary">
        <div class="box-body">
            <div class="form-group">
                {{ Form::label('nome','Nome do papel:') }}
                {{ Form::text('nome',$data->nome,['class' => 'form-control','disabled']) }}
            </div>
            <div class="form-group">
                {{ Form::label('descricao','Sigla do papel:') }}
                {{ Form::text('descricao',$data->descricao,['class' => 'form-control','disabled']) }}
            </div>
            <div class="form-group">
                {{ Form::label('data_cadastro','Cadastrado em:') }}
                {{ Form::text('data_cadastro',$data->created_at->format('d/m/Y'),['class' => 'form-control','disabled']) }}
            </div>
            <div class="form-group">
                {{ Form::label('permissoes','Permissões associadas') }}
            @forelse($data->permissoes as $permissoes)
                {{ Form::text('permissoes',$permissoes->descricao,['class' => 'form-control','disabled']) }}
                <br>
            @empty
            <h3>Este usuário não tem permissões associadas!</h3>
            @endforelse
            </div>
            @include('admin.componentes.form_btn_show')
        </div>
    </div>
</div>
@stop
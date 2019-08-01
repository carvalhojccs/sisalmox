@extends('adminlte::page')
@section('content_header')
@include('admin.componentes.componente_breadcrumb_show')
@stop
@section('content')
<div class="content row">
    <div class="box box-primary">
        <div class="box-body">
            <div class="form-group">
                {{ Form::label('name','Nome do usuário:') }}
                {{ Form::text('name',$data->name,['class' => 'form-control','disabled']) }}
            </div>
            <div class="form-group">
                {{ Form::label('email','Email do usuário:') }}
                {{ Form::text('email',$data->email,['class' => 'form-control','disabled']) }}
            </div>
            <div class="form-group">
                {{ Form::label('data_cadastro','Cadastrado em:') }}
                {{ Form::text('data_cadastro',$data->created_at->format('d/m/Y'),['class' => 'form-control','disabled']) }}
            </div>
            <div class="form-group">
                {{ Form::label('papeis','Papeis associados') }}
            @forelse($data->papeis as $papel)
                {{ Form::text('papeis',$papel->descricao,['class' => 'form-control','disabled']) }}
                <br>
            @empty
            <h3>Este usuário não tem papéis associados!</h3>
            @endforelse
            </div>
            @include('admin.componentes.form_btn_show')
        </div>
    </div>
</div>
@stop
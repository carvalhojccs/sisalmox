@extends('adminlte::page')
@section('content_header')
<h1>{{ $titulo }}</h1>
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Início</a></li>
    <li class="active"><a href="#">Unidades</a></li>
</ol>
@stop
@section('content')
<div class="content row">
    <div class="box box-primary">
        <div class="box-body">
            {{ Form::open(['route' => 'unidades.search','class' => 'form form-inline']) }}
                {{ Form::text('nome',null,['placeholder' => 'Nome','class' => 'form-control']) }}
                {{ Form::text('sigla',null,['placeholder' => 'Sigla','class' => 'form-control']) }}
                {{ Form::submit('Pesquisar',['class' => 'btn btn-primary']) }}
            {{ Form::close() }}
            @if (isset($data))
                    <a href="{{ route('unidades.index') }}">(x) Limpar Resultados da Pesquisa</a>
                @endif
        </div>
    </div>
    <div class="box box-primary">
        <div class="box-header">
            <a href="{{ route('unidades.create') }}" class="btn btn-success"><i class="fa fa-file"></i> Novo</a>
        </div>
        <div class="box-body">
            @include('admin.includes.alerts')
            <table class="table table-hover">
                <thead>
                    <tr>
                      <th>ID</th>
                      <th>Nome</th>
                      <th>Sigla</th>
                      <th>Ação</th>
                    </tr>    
                </thead>
                <tbody>
                @foreach ($unidades as $unidade)
                <tr>
                    <td>{{$unidade->id}}</td>
                    <td>{{$unidade->nome}}</td>
                    <td>{{$unidade->sigla}}</td>
                    <td>
                        <a href="{{ route('unidades.show', $unidade->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-eye">&nbsp;</i>Detalhes</a>
                    </td>
                </tr>
                @endforeach
              </tbody>
            </table>
            @if (isset($data))
                {!! $unidades->appends($data)->links() !!}
            @else
                {!! $unidades->links() !!}
            @endif
        </div>
    </div>
</div>
@stop

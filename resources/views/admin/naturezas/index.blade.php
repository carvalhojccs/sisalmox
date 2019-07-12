@extends('adminlte::page')
@section('content_header')
<h1>{{ $titulo }}</h1>
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard">Início</i></a></li>
    <li class="active"><a href="{{ route('naturezas.index') }}">Natureza</a></li>
</ol>
@stop
@section('content')
<div class="content row">
    <div class="box box-primary">
        <div class="box-body">
            {{ Form::open(['route' => 'naturezas.search','class' => 'form form-inline']) }}
            {{ Form::text('codigo',null,['placeholder' => 'Natureza de despesa','class' => 'form-control']) }}
            {{ Form::submit('Pesquisar',['class' => 'btn btn-primary']) }}
            {{ Form::close() }}
            @if(isset($filter))
            <a href="{{ route('naturezas.index') }}">(x) Limpar Resultados da Pesquisa</a>
            @endif
        </div>
    </div>
    <div class="box box-primary">
        <div class="box-header">
            <a href="{{ route('naturezas.create') }}" class="btn btn-success"><i class="fa fa-file">&nbsp;</i>Novo</a>
        </div>
        <div class="box-body">
            @include('admin.includes.alerts')
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Natureza</th>
                        <th>Descrição</th>
                        <th>Ação</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $natureza)
                    <tr>
                        <td>{{ $natureza->id }}</td>
                        <td>{{ $natureza->codigo }}</td>
                        <td>{{ $natureza->descricao }}</td>
                        <td>
                            <a href="{{ route('naturezas.show', $natureza->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-eye">&nbsp;</i>Detalhes</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $data->links() }}
        </div>
    </div>
</div>
@stop
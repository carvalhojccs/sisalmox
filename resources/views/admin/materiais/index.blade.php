@extends('adminlte::page')
@section('content_header')
@include('admin.componentes.componente_breadcrumb_index')
@stop
@section('content')
<div class="content row">
    <div class="box box-primary">
        <div class="box-body">
            {{ Form::open(['route' => request()->segment(2).'.search','class' => 'form form-inline']) }}
                {{ Form::select('conta_id',$contas ?? '',null,['placeholder' => 'Selecione uma conta...', 'class' => 'form-control', 'id' => 'armazens']) }}
                {{ Form::select('unidade_id',$unidades ?? '',null,['placeholder' => 'Selecione uma unidade...', 'class' => 'form-control', 'id' => 'armazens']) }}
                {{ Form::text('codigo',$filters['codigo'] ?? '',['placeholder' => 'Código do material','class' => 'form-control']) }}
                {{ Form::text('descricao',$filters['descricao'] ?? '',['placeholder' => 'Desrição do material','class' => 'form-control']) }}
                {{ Form::submit('Pesquisar',['class' => 'btn btn-primary']) }}
                @if(isset($filters))
                    <a href="{{ route(request()->segment(2).'.index') }}">(x) Limpar Resultados da Pesquisa</a>
                @endif
            {{ Form::close() }}
        </div>
    </div>
    <div class="box box-primary">
        <div class="box-header">
            <a href="{{ route(request()->segment(2).'.create') }}" class="btn btn-success"><i class="fa fa-file"></i><span>&nbsp;&nbsp;</span><span>Novo</span></a>
        </div>
        <div class="box-body">
            @include('admin.includes.alerts')
    <table class='table table-hover'>
        <thead>
            <tr>
                <th>Código</th>
                <th>Descrição</th>
                <th>Unidade</th>
                <th>Estoque Atual</th>
                <th>Última Compra</th>
                <th>Última Saída</th>
                <th>Ação</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $material)
            <tr>
                <td>{{ $material->codigo }}</td>
                <td>{{ $material->descricao }}</td>
                <td>{{ $material->unidade->sigla }}</td>
                <td>{{ $material->estoque_atual }}</td>
                <td>{{ $material->ultima_compra }}</td>
                <td>{{ $material->ultima_saida }}</td>
                <td>
                    <a href="{{ route(request()->segment(2).'.show', $material->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-eye">&nbsp;</i>Detalhes</a>
                    <a href="#" class="btn btn-sm btn-success"><i class="fa fa-bus">&nbsp;</i>Aplicação</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@include('admin.componentes.links')
        </div>
    </div>
</div>
@stop
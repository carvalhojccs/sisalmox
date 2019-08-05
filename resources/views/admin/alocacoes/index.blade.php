@extends('adminlte::page')
@section('content_header')
@include('admin.componentes.componente_breadcrumb_index')
@stop
@section('content')
<div class="content row">
    <div class="box box-primary">
        <div class="box-body">
            {{ Form::open(['route' => request()->segment(2).'.search','class' => 'form form-inline']) }}
                {{ Form::text('nome',$filters['nome'] ?? '',['placeholder' => 'Nome do armazem','class' => 'form-control']) }}
                {{ Form::text('sigla',$filters['sigla'] ?? '',['placeholder' => 'Código do armazem','class' => 'form-control']) }}
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
                        <th>Nome</th>
                        <th>Local</th>
                        <th>Função</th>
                        <th>Ação</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                    @if(isset($item->local))
                    <tr>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->local->sigla }}</td>
                        @foreach($item->papeis as $papel)
                        <td>{{ $papel->nome }}</td>
                        @endforeach
                        <td>
                            <a href="{{ route(request()->segment(2).'.show', $item->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-eye">&nbsp;</i>Detalhes</a>
                        </td>
                    </tr>
                    @endif
                    @endforeach
                </tbody>
            </table>
            @include('admin.componentes.links')
        </div>
    </div>
</div>
@stop
@extends('adminlte::page')
@section('content_header')
@include('admin.componentes.componente_breadcrumb_index')
@stop
@section('content')
<div class="content row">
    <div class="box box-primary">
        <div class="box-body">
            {{ Form::open(['route' => request()->segment(2).'.search','class' => 'form form-inline']) }}
                {{ Form::text('nome',$filters['nome'] ?? '',['placeholder' => 'Nome do local','class' => 'form-control']) }}
                {{ Form::text('sigla',$filters['sigla'] ?? '',['placeholder' => 'Sigla do local','class' => 'form-control']) }}
                {{ Form::submit('Pesquisar',['class' => 'btn btn-primary']) }}
                @if(isset($filters))
                    <a href="{{ route(request()->segment(2).'.index') }}">(x) Limpar Resultados da Pesquisa</a>
                @endif
            {{ Form::close() }}
        </div>
    </div>
    <div class="box box-primary">
        @include('admin.componentes.componente_btn_novo')
        <div class="box-body">
            @include('admin.includes.alerts')
            <table class='table table-hover'>
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Sigla</th>
                        <th>Ação</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                    <tr>
                        <td>{{ $item->nome }}</td>
                        <td>{{ $item->sigla }}</td>
                        <td>
                            <a href="{{ route(request()->segment(2).'.show', $item->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-eye">&nbsp;</i>Detalhes</a>
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
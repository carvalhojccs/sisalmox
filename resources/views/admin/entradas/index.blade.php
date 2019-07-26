@extends('adminlte::page')
@section('content_header')
@include('admin.componentes.componente_breadcrumb_index')
@stop
@section('content')
<div class="content row">
    <div class="box box-primary">
        <div class="box-body">
            #form
        </div>
    </div>
    <div class="box box-primary">
        <div class="box-header">
            <a href="{{ route('entradas.create') }}" class="btn btn-success"><i class="fa fa-file"></i><span>&nbsp;&nbsp;</span><span>Novo</span></a>
        </div>
        <div class="box-body">
            <div class="table-responsive">
@include('admin.includes.alerts')
            <table class='table table-hover'>
            <thead>
                <tr>
                    <th>Tipo Entrada</th>
                    <th>Documento</th>
                    <th>Data documento</th>
                    <th>Data entrada</th>
                    <th>Material</th>
                    <th>Natureza</th>
                    <th>Quantidade</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                <tr>
                    <td>{{ $item->tipoMovimento->nome }}</td>
                    <td>{{ $item->numero_documento }}</td>
                    <td>{{ \Carbon\Carbon::parse($item->data_documento)->format('d/m/Y') }}</td>
                    <td>{{ $item->created_at->format('d/m/Y') }}</td>
                    <td>{{ $item->material->descricao }}</td>
                    <td>{{ $item->natureza->codigo }}</td>
                    <td>{{ $item->quantidade }}</td>

                    <td>
                        <a href="{{ route(request()->segment(2).'.show', $item->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-eye">&nbsp;</i>Detalhes</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
            </div>
        </div>
    </div>
</div>
@stop
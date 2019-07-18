@extends('adminlte::page')
@section('content_header')
<h1>{{ $titulo }}</h1>
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i>Início</a></li>
    <li class="active"><a href="{{ route('equipamentos.index') }}">Equipamentos</a></li>
</ol>
@stop
@section('content')
<div class="content row">
    <div class="box box-primary">
        <div class="box-body">
            {{ Form::open(['route' => 'equipamentos.search','class' => 'form form-inline']) }}
            {{ Form::text('nome',$filter['nome'] ?? '',['placeholder' => 'Nome do equipamento','class' => 'form-control']) }}
            {{ Form::submit('Pesquisar',['class' => 'btn btn-primary']) }}
            @if(isset($filter))
            <a href="{{ route('equipamentos.index') }}">(x) Limpar Resultados da Pesquisa</a>
            @endif
            {{ Form::close() }}
            
        </div>
    </div>
    <div class="box box-primary">
        <div class="box-header">
            <a href="{{ route('equipamentos.create') }}" class="btn btn-success"><i class="fa fa-file">&nbsp;</i>Novo</a>
        </div>
        <div class="box-body">
            @include('admin.includes.alerts')
            <table class='table table-hover'>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Ação</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $equipamento)
                    <tr>
                        <td>{{ $equipamento->id }}</td>
                        <td>{{ $equipamento->nome }}</td>
                        <td>
                            <a href="{{ route('equipamentos.show',$equipamento->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-eye">&nbsp;</i>Detalhes</a> 
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @if(isset($filter))
            {!! $data->appends($filter)->links() !!}
            @else
            {!! $data->links() !!}
            @endif
        </div>
    </div>
</div>
@stop
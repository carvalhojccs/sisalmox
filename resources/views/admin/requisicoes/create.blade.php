@extends('adminlte::page')
@section('content_header')
@include('admin.componentes.component_breadcrumb_create')
@stop
@section('content')
<div class="content row">
    <div class="box box-primary">
        <div class="box box-body">
            @include('admin.includes.alerts')
            {{ Form::open(['route' => request()->segment(2).'.store','class' => 'form']) }}
                @include('admin.'.request()->segment(2).'.partials.form')
            {{ Form::close() }}
        </div>
    </div>
</div>
@section('js')
<script>
    $(document).ready(function(){
        $('#armazens').select2();
    });
</script>
@stop
@stop
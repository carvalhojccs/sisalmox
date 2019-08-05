@extends('adminlte::page')
@section('content_header')
@include('admin.componentes.componente_breadcrumb_create')
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
        $('#usuarios').select2();
        $('#locais').select2();
        $('#locais').prop('disabled',true);
        
        $('#usuarios').on('change',function(){
           $('#locais').prop('disabled', false); 
        });
    });
</script>
@stop
@stop
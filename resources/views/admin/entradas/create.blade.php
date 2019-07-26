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
@push('mask')
<script src="{{ asset('vendor/adminlte/vendor/jquery/dist/jquery.mask.js') }}"></script>
@endpush
@section('js')
<script>
    
    $('#dinheiro').mask('#.##0,00',{reverse: true})
    
    
    $('#documentos').prop('disabled', true);
    $('#numero').prop('disabled', true);
    $('#data_documento').prop('disabled', true);
    $('#contas').prop('disabled', true);
    $('#natureza').prop('disabled', true);
    $('#material').prop('disabled', true);
    $('#armazem').prop('disabled', true);
    $('#armazenagem').prop('disabled', true);
    $('#quantidade').prop('disabled', true);
    $('#dinheiro').prop('disabled', true);
    
    $(document).ready(function(){
       $('#tipo_movimento').select2();
       $('#contas').select2();
       $('#material').select2();
    });
    
    $('#tipo_movimento').on('change', function(){
        $('#documentos').prop('disabled', false);
    });
    
    $('#documentos').on('change', function(){
        $('#numero').prop('disabled', false);
        $('#data_documento').prop('disabled', false);
    });
    
    $('#data_documento').on('change', function(){
        $('#contas').prop('disabled', false);
    });
    
    var conta_id
    
    $('#contas').on('change', function(e){
       conta_id = e.target.value;
       $('#natureza').prop('disabled', false);
       $('#natureza option').prop('selected', function() {
            return this.defaultSelected;
        });
       $('#material').empty();
       $('#material').append('<option> Selecione...</option>');
    });
    
    var natureza_id;
    
    $('#natureza').on('change',function(e){
        natureza_id = e.target.value;
        
        $('#material').empty();
       $('#material').append('<option> Selecione...</option>');
       $.get('/sisalmox/api/materiais?conta_id='+conta_id, function(data){
           $('#material').prop('disabled', false);
           $.each(data, function(index,material){
              $('#material').append('<option value="'+ material.id + '">' + material.descricao + '</option>'); 
           });
       });
       
       $('#estoque_atual').val('');
        
    })
    
    $('#material').on('change',function(e){
        var material_id = e.target.value;
        $('#armazem').prop('disabled', false);
        $('#estoque_atual').empty();
        $.get('/sisalmox/api/estoque_atual?material_id='+material_id+'&natureza_id='+natureza_id, function(data){
            console.log(data);
              $('#estoque_atual').val(data); 
        });
    });
    
    $('#material').on('change',function(){
        $('#natureza').prop('disabled',false);
    });
    
    $('#armazem').on('change',function(e){
        var armazem_id = e.target.value;
        $('#armazenagem').empty();
        $('#armazenagem').append('<option> Selecione... </option>');
        $.get('/sisalmox/api/armazenagens?armazenagem_id=' + armazem_id, function(data){
           $('#armazenagem').prop('disabled',false);
           $.each(data,function(index, armazenagem){
               $('#armazenagem').append('<option value="' + armazenagem.id + '">' + armazenagem.nome + '</option>' );
           });
        });
    });
    
    $('#armazenagem').on('change', function(){
        $('#quantidade').prop('disabled', false);
    $('#dinheiro').prop('disabled', false);
    });
    
</script>
@stop
@stop
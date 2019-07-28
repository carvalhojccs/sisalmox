<div class="form-row">
    <div class="form-group col-md-6">
        {{ Form::label('nome','Papel') }}
        {{ Form::text('nome',null,['placeholder' => 'Nome do Papel','class' => 'form-control']) }}
    </div>
    <div class="form-group col-md-6">
        {{ Form::label('descricao','Descrição') }}
        {{ Form::text('descricao',null,['placeholder' => 'Descrição do Papel','class' => 'form-control']) }}
    </div>
</div>
@include('admin.componentes.componente_form_btn_salvar')
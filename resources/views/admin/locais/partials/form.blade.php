<div class="form-row">
    <div class="form-group col-md-6">
        {{ Form::label('nome','Local') }}
        {{ Form::text('nome',null,['placeholder' => 'Nome do Local','class' => 'form-control']) }}
    </div>
    <div class="form-group col-md-6">
        {{ Form::label('sigla','Sigla') }}
        {{ Form::text('sigla',null,['placeholder' => 'Sigla do Local','class' => 'form-control']) }}
    </div>
</div>
@include('admin.componentes.componente_form_btn_salvar')
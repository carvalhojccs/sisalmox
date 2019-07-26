<div class="form-row">
    <div class="form-group col-md-6">
        {{ Form::label('nome','Documento') }}
        {{ Form::text('nome',null,['placeholder' => 'Nome do documento','class' => 'form-control']) }}
    </div>
    <div class="form-group col-md-6">
        {{ Form::label('sigla','Sigla') }}
        {{ Form::text('sigla',null,['placeholder' => 'Sigla do documento','class' => 'form-control']) }}
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-12">
        {{ FORM::button('<i class="fa fa-save"></i> Salvar',['class'=>'btn btn-sm btn-success','type'=>'submit']) }}
        <a href="{{ route(request()->segment(2).'.index') }}" class="btn btn-sm btn-primary"><i class="fa fa-backward">&nbsp;</i>Voltar</a>
    </div>
</div>
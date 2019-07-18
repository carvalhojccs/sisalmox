<div class="form-group">
    {{ Form::label('nome','Conta Corrente') }}
    {{ Form::text('nome',null,['placeholder' => 'Nome da Conta Corrente','class' => 'form-control']) }}
</div>
<div class="form-group">
    {{ Form::label('codigo','Código') }}
    {{ Form::text('codigo',null,['placeholder' => 'Código da Conta Corrente','class' => 'form-control']) }}
</div>
<div class="form-group">
{{ FORM::button('<i class="fa fa-save"></i> Salvar',['class'=>'btn btn-sm btn-success','type'=>'submit']) }}
<a href="{{ route(request()->segment(2).'.index') }}" class="btn btn-sm btn-primary"><i class="fa fa-backward">&nbsp;</i>Voltar</a>
</div>

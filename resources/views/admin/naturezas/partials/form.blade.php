<div class="form-group">
    {{ Form::label('codigo','Natureza') }}
    {{ Form::text('codigo',null,['placeholder' => 'Natureza da despesa','class' => 'form-control']) }}
</div>
<div class="form-group">
    {{ Form::label('descricao','Descrição') }}
    {{ Form::text('descricao',null,['placeholder' => 'Descrição','class' => 'form-control']) }}
</div>
<div class="form-group">
{{ Form::submit('Salvar',['class' => 'btn btn-primary']) }}
</div>

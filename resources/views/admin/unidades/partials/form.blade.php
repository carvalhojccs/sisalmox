<div class="form-group">
    {{ Form::label('nome','Unidade') }}
    {{ Form::text('nome',null,['placeholder' => 'Nome da Unidade','class' => 'form-control']) }}
</div>
<div class="form-group">
    {{ Form::label('sigla','Sigla') }}
    {{ Form::text('sigla',null,['placeholder' => 'Sigla da Unidade','class' => 'form-control']) }}
</div>
<div class="form-group">
{{ Form::submit('Salvar',['class' => 'btn btn-primary']) }}
</div>

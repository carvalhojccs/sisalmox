<div class="form-group">
    {{ Form::label('nome','Equipamento') }}
    {{ Form::text('nome',null,['placeholder' => 'Nome do Equipamento','class' => 'form-control']) }}
</div>
<div class="form-group">
{{ Form::submit('Salvar',['class' => 'btn btn-primary']) }}
</div>

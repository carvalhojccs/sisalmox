<div class="form-row">
    <div class="form-group col-md-12">
        {{ Form::label('equipamento_id','Aplicação') }}
        {{ Form::select('equipamento_id',$equipamentos,null,['placeholder' => 'Selecione um equipamento...', 'class' => 'form-control', 'id' => 'equipamento']) }}
        
    </div>
    <div class="form-group col-md-12">
        {{ Form::label('justificativa','Justificativa') }}
        {{ Form::text('justificativa',null,['placeholder' => 'Justificativa','class' => 'form-control']) }}
    </div>
    <div class="form-group col-md-6">
        {{ Form::label('motivo','') }}
        {{ Form::text('sigla',null,['placeholder' => 'Sigla do local de armazenagem','class' => 'form-control']) }}
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-12">
        {{ FORM::button('<i class="fa fa-save"></i> Salvar',['class'=>'btn btn-sm btn-success','type'=>'submit']) }}
        <a href="{{ route(request()->segment(2).'.index') }}" class="btn btn-sm btn-primary"><i class="fa fa-backward">&nbsp;</i>Voltar</a>
    </div>
</div>
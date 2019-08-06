<div class="form-row">
    <div class="form-group col-md-12">
        {{ Form::label('armazem_id','Armazens') }}
        
        {{ Form::select('armazem_id',$armazens,null,['placeholder' => 'Selecione um armazem...', 'class' => 'form-control', 'id' => 'armazens']) }}
        
    </div>
    
    <div class="form-group col-md-6">
        {{ Form::label('nome','Aramzenagem') }}
        {{ Form::text('nome',null,['placeholder' => 'Nome do Local de armazenagem','class' => 'form-control']) }}
    </div>
    <div class="form-group col-md-6">
        {{ Form::label('sigla','Sigla') }}
        {{ Form::text('sigla',null,['placeholder' => 'Sigla do local de armazenagem','class' => 'form-control']) }}
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-12">
        {{ FORM::button('<i class="fa fa-save"></i> Salvar',['class'=>'btn btn-sm btn-success','type'=>'submit']) }}
        <a href="{{ route(request()->segment(2).'.index') }}" class="btn btn-sm btn-primary"><i class="fa fa-backward">&nbsp;</i>Voltar</a>
    </div>
</div>
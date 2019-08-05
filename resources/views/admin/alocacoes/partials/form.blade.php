<div class="form-row">
    <div class="form-group col-md-12">
        {{ Form::label('usuario_id','Usuários') }}
        
        {{ Form::select('usuario_id',$usuarios,null,['placeholder' => 'Selecione um usuario...', 'class' => 'form-control', 'id' => 'usuarios']) }}
        
    </div>
    
    <div class="form-group col-md-12">
        {{ Form::label('local_id','Locais') }}
        
        {{ Form::select('local_id',$locais,null,['placeholder' => 'Selecione uma alocação...', 'class' => 'form-control', 'id' => 'locais']) }}
        
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-12">
        {{ FORM::button('<i class="fa fa-save"></i> Salvar',['class'=>'btn btn-sm btn-success','type'=>'submit']) }}
        <a href="{{ route(request()->segment(2).'.index') }}" class="btn btn-sm btn-primary"><i class="fa fa-backward">&nbsp;</i>Voltar</a>
    </div>
</div>
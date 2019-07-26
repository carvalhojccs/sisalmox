<div class="form-row">
    <div class="form-group col-md-12">
        {{ Form::label('conta_id','Conta corrente') }}
        {{ Form::select('conta_id',$contas,null,['placeholder' => 'Selecione uma conta...', 'class' => 'form-control', 'id' => 'contas']) }}
    </div>    
    <div class="form-group col-md-6">
        {{ Form::label('descricao','Descrição do material') }}
        {{ Form::text('descricao',null,['placeholder' => 'Descrição do material','class' => 'form-control']) }}
    </div>
    <div class="form-group col-md-3">
        {{ Form::label('codigo','Código') }}
        {{ Form::text('codigo',null,['placeholder' => 'Código do material','class' => 'form-control']) }}
    </div>
    <div class="form-group col-md-3">
        {{ Form::label('unidade_id','Unidade') }}
        {{ Form::select('unidade_id',$unidades,null,['placeholder' => 'Unidade...', 'class' => 'form-control', 'id' => 'contas']) }}
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-3">
        {{ Form::label('estoque_minimo','Estoque mínimo') }}
        {{ Form::text('estoque_minimo',null,['class' => 'form-control']) }}
    </div>
    <div class="form-group col-md-3">
        {{ Form::label('estoque_maximo','Estoque máximo') }}
        {{ Form::text('estoque_maximo',null,['class' => 'form-control']) }}
    </div>
    <div class="form-group col-md-3">
        {{ Form::label('ponto_reposicao','Ponto de reposição') }}
        {{ Form::text('ponto_reposicao',null,['class' => 'form-control']) }}
    </div>
    <div class="form-group col-md-3">
        {{ Form::label('prazo_compra','Prazo de compra (dias)') }}
        {{ Form::text('prazo_compra',null,['class' => 'form-control']) }}
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-12">
        {{ FORM::button('<i class="fa fa-save"></i> Salvar',['class'=>'btn btn-sm btn-success','type'=>'submit']) }}
        <a href="{{ route(request()->segment(2).'.index') }}" class="btn btn-sm btn-primary"><i class="fa fa-backward">&nbsp;</i>Voltar</a>
    </div>
</div>

<div class="form-row">
    <div class="form-group col-md-12">
    {{ Form::label('tipo_movimento_id','Tipo de Movimento') }}
    {{ Form::select('tipo_movimento_id',$tipo_movimentos,null,['placeholder' => 'Selecione...', 'class' => 'form-control', 'id' => 'tipo_movimento' ]) }}
    </div>
    <div class="form-group col-md-6">
        {{ Form::label('documento_id','Documento') }}
        {{ Form::select('documento_id',$documentos,null,['placeholder' => 'Selecione...', 'class' => 'form-control' ,'id' => 'documentos']) }}
    </div>
    <div class="form-group col-md-3">
        {{ Form::label('numero_documento','Número') }}
        {{ Form::text('numero_documento',null,['placeholder' => 'Número do documento', 'class' => 'form-control', 'id' => 'numero']) }}
    </div>
    <div class="form-group col-md-3">
        {{ Form::label('data_documento','Data') }}
        {{ Form::date('data_documento',null,['placeholder' => 'Data do documento', 'class' => 'form-control', 'id' => 'data_documento']) }}
    </div>
    <div class="form-group col-md-12">
        {{ Form::label('conta_id','Conta') }}
        {{ Form::select('conta_id',$contas,null,['placeholder' => 'Selecione...', 'class' => 'form-control' ,'id' => 'contas']) }}
    </div>
    <div class="form-group col-md-12">
        {{ Form::label('natureza_id','Natureza') }}
        {{ Form::select('natureza_id',$naturezas,null,['placeholder' => 'Selecione...', 'class' => 'form-control' ,'id' => 'natureza']) }}
    </div>
    <div class="form-group col-md-10">
        {{ Form::label('material_id','Material') }}
        <select name="material_id" class="form-control" id="material">
            <option value="0">Selecione...</option>
        </select>
        
    </div>
    <div class="form-group col-md-2">
        {{ Form::label('estoque_atual','Estoque') }}
        <input type="text" class="form-control" id="estoque_atual" value="" disabled="true">
    </div>
    
    <div class="form-group col-md-6">
        {{ Form::label('armazem_id','Armazem') }}
        {{ Form::select('armazem_id',$armazens,null,['placeholder' => 'Selecione...', 'class' => 'form-control' ,'id' => 'armazem']) }}
    </div>
    <div class="form-group col-md-6">
        {{ Form::label('armazenagem_id','Local de armazenagem') }}
        <select name="armazenagem_id" class="form-control" id="armazenagem"></select>
    </div>
    <div class="form-group col-md-3">
        {{ Form::label('quantidade','Quantidade') }}
        {{ Form::number('quantidade',null,['class' => 'form-control', 'id' => 'quantidade']) }}
    </div>
    <div class="form-group col-md-3">
        {{ Form::label('preco','Preço Unitário') }}
        {{ Form::text('preco',null,['placeholder' => 'R$','class' => 'form-control', 'id' => 'dinheiro']) }}
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-12">
        {{ FORM::button('<i class="fa fa-save"></i> Salvar',['class'=>'btn btn-sm btn-success','type'=>'submit']) }}
        <a href="{{ route(request()->segment(2).'.index') }}" class="btn btn-sm btn-primary"><i class="fa fa-backward">&nbsp;</i>Voltar</a>
    </div>
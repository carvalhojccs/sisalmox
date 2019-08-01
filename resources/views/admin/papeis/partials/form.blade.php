<div class="form-row">
    <div class="form-group col-md-6">
        {{ Form::label('nome','Papel') }}
        {{ Form::text('nome',null,['placeholder' => 'Nome do Papel','class' => 'form-control']) }}
    </div>
    <div class="form-group col-md-6">
        {{ Form::label('descricao','Descrição') }}
        {{ Form::text('descricao',null,['placeholder' => 'Descrição do Papel','class' => 'form-control']) }}
    </div>
    <div class="form-group col-md-6">
        <h3>Permisões disponíveis</h3>
        @foreach ($permissoes as $permissao)
        <div>
            {{ Form::checkbox('permissoes[]', $permissao->id, false,null) }}
            {{ Form::label($permissao->descricao, $permissao->descricao) }}
        </div>
        @endforeach
    </div>
    @if(isset($data))
    <div class="form-group col-md-6">
        <h3>Permissões associados</h3>
        @foreach ($data->permissoes as $permissao)
        <div>
            {{ Form::checkbox('permissoes[]', $permissao->id, true,null) }}
            {{ Form::label($permissao->descricao, $permissao->descricao) }}
        </div>
        @endforeach
    </div>
    @endif
</div>
@include('admin.componentes.componente_form_btn_salvar')
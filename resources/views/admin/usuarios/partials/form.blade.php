<div class="form-row">
    <div class="form-group col-md-12">
        {{ Form::label('name','Nome do usuário') }}
        {{ Form::text('name',null,['placeholder' => 'Nome','class' => 'form-control']) }}
    </div>
    <div class="form-group col-md-6">
        {{ Form::label('email','E-mail do usuário') }}
        {{ Form::email('email',null,['placeholder' => 'E-mail','class' => 'form-control']) }}
    </div>
    <div class="form-group col-md-6">
        {{ Form::label('password','Senha (Nova senha)') }}
        {{ Form::password('password',['placeholder' => 'Senha','class' => 'form-control']) }}
    </div>
    <div class="form-group col-md-6">
        <h3>Perfís disponíveis</h3>
        @foreach ($papeis as $papel)
        <div>
            {{ Form::checkbox('papeis[]', $papel->id, false,null) }}
            {{ Form::label($papel->descricao, $papel->descricao) }}
        </div>
        @endforeach
    </div>
    @if(isset($data))
    <div class="form-group col-md-6">
        <h3>Perfís associados</h3>
        @foreach ($data->papeis as $papel)
        <div>
            {{ Form::checkbox('papeis[]', $papel->id, true,null) }}
            {{ Form::label($papel->descricao, $papel->descricao) }}
        </div>
        @endforeach
    </div>
    @endif
</div>
@include('admin.componentes.componente_form_btn_salvar')
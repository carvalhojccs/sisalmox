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
</div>
<div class="form-row">
    <div class="form-group col-md-12">
        {{ FORM::button('<i class="fa fa-save"></i> Salvar',['class'=>'btn btn-sm btn-success','type'=>'submit']) }}
        <a href="{{ route(request()->segment(2).'.index') }}" class="btn btn-sm btn-primary"><i class="fa fa-backward">&nbsp;</i>Voltar</a>
    </div>
</div>
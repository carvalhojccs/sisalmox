
<div class="form-row">
    <div class="form-group col-md-6">
        {{ Form::label('nome','Conta Corrente') }}
        {{ Form::text('nome',null,['placeholder' => 'Nome da Conta Corrente','class' => 'form-control']) }}
    </div>
    <div class="form-group col-md-6">
        {{ Form::label('codigo','Código') }}
        {{ Form::text('codigo',null,['placeholder' => 'Código da Conta Corrente','class' => 'form-control']) }}
    </div>
</div>
@if(request()->segment(4) == 'edit')
    <div class="form-row">
        <div class="form-group col-md-6">
            {{ Form::label('disponivel','Naturezas de despesas disponíveis') }} <br>
            @forelse ($naturezasDisponiveis as $natureza)
            {{ Form::checkbox('natureza_id[]',$natureza->id, false, null) }}
            {{ Form::label($natureza->codigo,$natureza->codigo) }}
            <br>
            @empty
            --
            @endforelse
        </div>
        <div class="form-group col-md-6">
            {{ Form::label('associada','Naturezas de despesas associadas') }} <br>
            @forelse ($data->naturezas as $associada)
            {{ Form::checkbox('natureza_id[]',$associada->id, true, null) }}
            {{ Form::label($associada->codigo,$associada->codigo) }}
            <br>
            @empty
            --
            @endforelse
        </div>
    </div>
@else
    <div class="form-row">
        <div class="form-group col-md-12">
            {{ Form::label('natureza_id','Naturezas de despesas disponíveis') }} <br>
            @foreach ($data as $natureza)
            {{ Form::checkbox('natureza_id[]',$natureza->id ?? '', false, null) }}
            {{ Form::label($natureza->codigo ?? '',$natureza->codigo ?? '') }}
            <br>
            @endforeach
        </div>
    </div>
@endif
<div class="form-row">
    <div class="form-group col-md-12">
        {{ FORM::button('<i class="fa fa-save"></i> Salvar',['class'=>'btn btn-sm btn-success','type'=>'submit']) }}
        <a href="{{ route(request()->segment(2).'.index') }}" class="btn btn-sm btn-primary"><i class="fa fa-backward">&nbsp;</i>Voltar</a>
    </div>
</div>





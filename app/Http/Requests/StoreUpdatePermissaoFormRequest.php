<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdatePermissaoFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
   public function rules()
    {
        $id = $this->segment(3);
        
        return [
            'nome'      => "required|min:3|max:100|unique:permissoes,nome,{$id},id",
            'descricao' => "required|unique:permissoes,descricao,{$id},id"
        ];
    }
    
    public function messages() 
    {
        return [
            'nome.required'         => 'O nome da permissão é obrigatório!',
            'nome.min'              => 'O nome da permissão deve ter pelomenos 3 caracteres!',
            'nome.max'              => 'O nome da permissão deve ter no máximo 100 caracteres!',
            'nome.unique'           => 'Nome da permissão já está cadastrado!',
            'descricao.required'    => 'A descricao da permissão é obrigatória!',
            'descricao.unique'      => 'Sigla da permissão já está cadastrada!',
        ];
    }
}

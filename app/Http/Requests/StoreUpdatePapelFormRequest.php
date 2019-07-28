<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdatePapelFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return TRUE;
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
            'nome'      => "required|min:3|max:100|unique:papeis,nome,{$id},id",
            'descricao' => "required|unique:papeis,descricao,{$id},id"
        ];
    }
    
    public function messages() 
    {
        return [
            'nome.required'         => 'O nome do papel é obrigatório!',
            'nome.min'              => 'O nome do papel deve ter pelomenos 3 caracteres!',
            'nome.max'              => 'O nome do papel deve ter no máximo 100 caracteres!',
            'nome.unique'           => 'Nome do papel já está cadastrado!',
            'descricao.required'    => 'A descricao do papel é obrigatória!',
            'descricao.unique'      => 'Sigla do papel já está cadastrada!',
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateUnidadeFormRequest extends FormRequest
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
            'nome'  => "required|min:3|max:100|unique:unidades,nome,{$id},id",
            'sigla' => "required|unique:unidades,sigla,{$id},id"
        ];
    }
    
    public function messages() 
    {
        return [
            'nome.required'     => 'O nome da unidade de fornecimento é obrigatório!',
            'nome.min'          => 'O nome da unidade de fornecimento deve ter pelomenos 3 caracteres!',
            'nome.max'          => 'O nome da unidade de fornecimento deve ter no máximo 100 caracteres!',
            'nome.unique'       => 'Nome da unidade de fornecimento já está cadastrado!',
            'sigla.required'    => 'A sigla da unidade de fornecimento é obrigatória!',
            'sigla.unique'      => 'Sigla da unidade de fornecimento já está cadastrada!',
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateLocalFormRequest extends FormRequest
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
            'nome'  => "required|min:3|max:100|unique:locais,nome,{$id},id",
            'sigla' => "required|unique:locais,sigla,{$id},id"
        ];
    }
    
    public function messages() 
    {
        return [
            'nome.required'     => 'O nome do local é obrigatório!',
            'nome.min'          => 'O nome do local deve ter pelomenos 3 caracteres!',
            'nome.max'          => 'O nome do local deve ter no máximo 100 caracteres!',
            'nome.unique'       => 'Nome do local já cadastrado!',
            'sigla.required'    => 'A sigla do local é obrigatória!',
            'sigla.unique'      => 'Sigla do local já cadastrada!',
        ];
    }
}

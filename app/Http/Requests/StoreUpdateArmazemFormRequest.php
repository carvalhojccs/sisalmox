<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateArmazemFormRequest extends FormRequest
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
            'nome'  => "required|min:3|max:100|unique:armazens,nome,{$id},id",
            'sigla' => "required|unique:armazens,sigla,{$id},id"
        ];
    }
    
    public function messages() 
    {
        return [
            'nome.required'     => 'O nome do armazem é obrigatório!',
            'nome.min'          => 'O nome do armazem deve ter pelomenos 3 caracteres!',
            'nome.max'          => 'O nome do armazem deve ter no máximo 100 caracteres!',
            'nome.unique'       => 'Nome do armazem já cadastrado!',
            'sigla.required'    => 'A sigla do armazem é obrigatória!',
            'sigla.unique'      => 'Sigla do armazem já cadastrada!',
        ];
    }
}

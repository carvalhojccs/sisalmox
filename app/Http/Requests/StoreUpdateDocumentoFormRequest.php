<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateDocumentoFormRequest extends FormRequest
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
            'nome'  => "required|min:3|max:100|unique:documentos,nome,{$id},id",
            'sigla' => "required|unique:documentos,sigla,{$id},id"
        ];
    }
    
    public function messages() 
    {
        return [
            'nome.required'     => 'O nome do documento é obrigatório!',
            'nome.min'          => 'O nome do documento deve ter pelomenos 3 caracteres!',
            'nome.max'          => 'O nome do documento deve ter no máximo 100 caracteres!',
            'nome.unique'       => 'Nome do documento já está cadastrado!',
            'sigla.required'    => 'A sigla do documento é obrigatória!',
            'sigla.unique'      => 'Sigla do documento já está cadastrada!',
        ];
    }
}

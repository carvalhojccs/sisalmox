<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateArmazenagemFormRequest extends FormRequest
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
        return [
            'armazem_id'    => "required",
            'nome'          => "required|min:5|max:100",
            'sigla'         => "required|min:3|max:10",
        ];
    }
    
    public function messages() 
    {
        return [
            'armazem_id.required'   => 'A escolha de um armazem é obrigatória!',
            'nome.required'     => 'O nome do local de armazenagem é obrigatório!',
            'nome.min'          => 'O nome do local de armazenagem deve ter pelomenos 5 caracteres!',
            'nome.max'          => 'O nome do local de armazenagem não pode ter mais que 100 caracteres!',
            'sigla.required'    => 'A sigla do local de armazenagem é obrigatório!',
            'sigla.min'         => 'A sigla do local de armazenagem deve ter pelomenos 3 caracteres!',
            'sigla.max'         => 'A sigla do local de armazenagem não pode ter mais que 100 caracteres!',
            
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateContaFormRequest extends FormRequest
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
            'codigo'    => "required|unique:contas,codigo,{$id},id",
            'nome'      => "required|min:5|max:100|unique:contas,nome,{$id},id"
        ];
    }
    
    public function messages() 
    {
        return [
            'codigo.required'   => 'O código da conta corrente é obrigatório!',
            'codigo.unique'     => 'Código de conta corrente já cadastrado!',
            'nome.required'     => 'O nome da conta corrente é obrigatório!',
            'nome.min'          => 'O nome da conta corrente deve ter pelomenos 5 caracteres!',
            'nome.max'          => 'O nome da conta corrente não pode ter mais que 100 caracteres!',
            'nome.unique'       => 'Nome de conta corrente já cadastrada!',
            
        ];
    }
}

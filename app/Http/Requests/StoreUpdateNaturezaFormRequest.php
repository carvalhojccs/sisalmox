<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateNaturezaFormRequest extends FormRequest
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
            'codigo'    => "required|min:6|max:6|unique:naturezas,codigo,{$id},id",
            'descricao' => "required|min:5|max:100|unique:naturezas,descricao,{$id},id",
        ];
    }
    
    public function messages() 
    {
        return [
            'codigo.required'       => 'O código da natureza da despesa é obrigatorio!',
            'codigo.min'            => 'O código da natureza da despesa tem que ter 6 digitos!',
            'codigo.max'            => 'O código da natureza da despesa tem que ter 6 digitos!',
            'codigo.unique'         => 'Código da natureza da despesa já cadastrado!',
            'descricao.required'    => 'A descrição da natureza da despesa é obrigatória!',
            'descricao.min'         => 'A descrição tem que ter pelomenos 5 caracteres!',
            'descricao.max'         => 'A descrição não pode ter mais que 100 caracteres!',
            'descricao.unique'      => 'Descrição já cadastrada!',
        ];
    }
}

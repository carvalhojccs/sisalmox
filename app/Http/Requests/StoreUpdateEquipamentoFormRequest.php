<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateEquipamentoFormRequest extends FormRequest
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
            'nome' => "required|min:3|max:7|unique:equipamentos,nome,{$id},id"
        ];
    }
    
    public function messages() 
    {
        return [
            'nome.required' => 'O nome do equipamento é obrigatório',
            'nome.min'      => 'O nome do equipamento deve ter pelomenos 3 caracteres',
            'nome.max'      => 'O nome do equipamento deve ter no máximo 7 caracteres Ex: XXX-123',
            'nome.unique'   => 'Equipamento já cadastrado',
        ];
    }
}

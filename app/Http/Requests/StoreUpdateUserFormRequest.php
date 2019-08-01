<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateUserFormRequest extends FormRequest
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
        
        $roles = [
            'name'      => "required|min:3|max:100|unique:users,name,{$id},id",
            'email'     => "required|min:3|max:100|unique:users,email,{$id},id",
            'password'  => "required|min:6|max:15|unique:users,password,{$id},id",
        ];
            
        if($this->isMethod('PUT')):
            $roles['password'] = 'max:15';
        endif;
        
        return $roles;
    }
    
    public function messages() 
    {
        return [
            'name.required'     => 'O nome do usuário é obrigatório!',
            'name.min'          => 'O nome do usuári odeve ter pelomenos 3 caracteres!',
            'name.max'          => 'O nome do usuário deve ter no máximo 100 caracteres!',
            'name.unique'       => 'Nome do usuáriojá cadastrado!',
            'email.required'    => 'O email do usuário é obrigatório!',
            'email.unique'      => 'Email do usuário já cadastrada!',
        ];
    }
}

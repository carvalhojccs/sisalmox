<?php

namespace App\Repositories\Core\Eloquent;

use App\Models\User;
use App\Repositories\Core\BaseEloquentRepository;
use App\Repositories\Interfaces\UserRepositoryInterface;
use Illuminate\Support\Facades\DB;

class EloquentUserRepository extends BaseEloquentRepository implements UserRepositoryInterface
{
    public function entity()
    {
        return User::class;
    }

    public function search(array $filters)
    {
        return $this->entity->where(function($query) use($filters){
            if($filters['name']):
                $query->where('email','LIKE',"%{$filters['name']}%");
            endif;
            
            if($filters['email']):
                $query->orWhere('email','LIKE',"%{$filters['email']}%");
            endif;
        })->paginate();
    }
    
    public function storeUser($request) 
    {
        
        //persiste o usuário no banco e retorna o seu id
        $id = DB::table('users')->insertGetId([
            'name'      => $request->name,
            'email'     => $request->email,
            'password'  => bcrypt($request->password)
        ]);
        
        //recupera o usuário persistido, pelo seu id
        $user = $this->entity->find($id);
        
        //recupera os papeis selecionados
        $papeis = $request->papeis;
        
        //associa o usuáriro aos papeis selecionados
        $user->papeis()->sync($papeis);
        
        return true;
    }

}

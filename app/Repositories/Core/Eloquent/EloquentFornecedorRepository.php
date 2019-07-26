<?php

namespace App\Repositories\Core\Eloquent;

use App\Models\Fornecedor;
use App\Repositories\Core\BaseEloquentRepository;
use App\Repositories\Interfaces\FornecedorRepositoryInterface;

class EloquentFornecedorRepository extends BaseEloquentRepository implements FornecedorRepositoryInterface
{
    public function entity() 
    {
        return Fornecedor::class;
    }

    public function search(array $filters) 
    {
        return  $this->entity->where(function($query) use($filters){
            if(isset($filters['nome'])):
                $query->where('nome','like',"%{$filters['nome']}%");
            endif;
            
            if(isset($filters['sigla'])):
                $query->where('sigla','like',"%{$filters['sigla']}%");
            endif;
            
        })->paginate();
    }

}

<?php

namespace App\Repositories\Core\Eloquent;

use App\Models\Armazenagem;
use App\Repositories\Core\BaseEloquentRepository;
use App\Repositories\Interfaces\ArmazenagemRepositoryInterface;

class EloquentArmazenagemRepository extends BaseEloquentRepository implements ArmazenagemRepositoryInterface
{
    public function entity()
    {
        return Armazenagem::class;
    }

    public function search(array $filters)
    {
        //dd($filters);
        
        return $this->entity->where(function($query) use($filters){
            if($filters['armazem_id']):
                $query->where('armazem_id',$filters['armazem_id']);
            endif;
            
            if($filters['sigla']):
                $query->where('sigla','LIKE',"%{$filters['sigla']}%");
            endif;
            
            if($filters['nome']):
                $query->where('nome','LIKE',"%{$filters['nome']}%");
            endif;
        })->paginate();
    }

}

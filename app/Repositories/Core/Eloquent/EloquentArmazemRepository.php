<?php

namespace App\Repositories\Core\Eloquent;

use App\Models\Armazem;
use App\Repositories\Core\BaseEloquentRepository;
use App\Repositories\Interfaces\ArmazemRepositoryInterface;

class EloquentArmazemRepository extends BaseEloquentRepository implements ArmazemRepositoryInterface
{
    public function entity()
    {
        return Armazem::class;
    }

    public function search(array $filters)
    {
        return $this->entity->where(function($query) use($filters){
            if($filters['sigla']):
                $query->where('sigla','LIKE',"%{$filters['sigla']}%");
            endif;
            
            if($filters['nome']):
                $query->orWhere('nome','LIKE',"%{$filters['nome']}%");
            endif;
        })->paginate();
    }
    
    public function selectArmazens() 
    {
        return $this->entity->pluck('nome','id');
    }

}

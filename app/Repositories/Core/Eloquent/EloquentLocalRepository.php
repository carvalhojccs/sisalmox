<?php

namespace App\Repositories\Core\Eloquent;

use App\Models\Local;
use App\Repositories\Core\BaseEloquentRepository;
use App\Repositories\Interfaces\LocalRepositoryInterface;

class EloquentLocalRepository extends BaseEloquentRepository implements LocalRepositoryInterface
{
    public function entity()
    {
        return Local::class;
    }

    public function search(array $filters)
    {
        return $this->entity->where(function($query) use($filters){
            if($filters['sigla']):
                $query->where('sigla','LIKE',"%{$filters['sigla']}%");
            endif;
            
            if($filters['nome']):
                $query->where('nome','LIKE',"%{$filters['nome']}%");
            endif;
        })->paginate();
    }
}

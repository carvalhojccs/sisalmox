<?php

namespace App\Repositories\Core\Eloquent;

use App\Models\Papel;
use App\Repositories\Core\BaseEloquentRepository;
use App\Repositories\Interfaces\PapelRepositoryInterface;

class EloquentPapelRepository extends BaseEloquentRepository implements PapelRepositoryInterface
{
    public function entity()
    {
        return Papel::class;
    }

    public function search(array $filters)
    {
        return $this->entity->where(function($query) use($filters){
            if($filters['descricao']):
                $query->where('descricao','LIKE',"%{$filters['descricao']}%");
            endif;
            
            if($filters['nome']):
                $query->orWhere('nome','LIKE',"%{$filters['nome']}%");
            endif;
        })->paginate();
    }
}

<?php

namespace App\Repositories\Core\Eloquent;

use App\Models\Permissao;
use App\Repositories\Core\BaseEloquentRepository;
use App\Repositories\Interfaces\PermissaoRepositoryInterface;

class EloquentPermissaoRepository extends BaseEloquentRepository implements PermissaoRepositoryInterface
{
    public function entity()
    {
        return Permissao::class;
    }

    public function search(array $filters)
    {
        return $this->entity->where(function($query) use($filters){
            if($filters['descricao']):
                $query->where('descricao','LIKE',"%{$filters['descricao']}%");
            endif;
            
            if($filters['nome']):
                $query->where('nome','LIKE',"%{$filters['nome']}%");
            endif;
        })->paginate();
    }
    
}

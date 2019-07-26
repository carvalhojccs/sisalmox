<?php

namespace App\Repositories\Core\Eloquent;

use App\Models\Unidade;
use App\Repositories\Core\BaseEloquentRepository;
use App\Repositories\Interfaces\UnidadeRepositoryInterface;
use Illuminate\Http\Request;

class EloquentUnidadeRepository extends BaseEloquentRepository implements UnidadeRepositoryInterface
{
    public function entity() 
    {
        return Unidade::class;
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
    
    public function selectUnidades() 
    {
        return $this->entity->pluck('nome', 'id');
    }

}

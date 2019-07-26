<?php

namespace App\Repositories\Core\Eloquent;

use App\Models\Movimento;
use App\Repositories\Core\BaseEloquentRepository;
use App\Repositories\Interfaces\MovimentoRepositoryInterface;
use Illuminate\Http\Request;

class EloquentMovimentoRepository extends BaseEloquentRepository implements MovimentoRepositoryInterface
{
    public function entity() 
    {
        return Movimento::class;
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
    
    public function selectMovimentos() 
    {
        return $this->entity->pluck('nome', 'id');
    }

}

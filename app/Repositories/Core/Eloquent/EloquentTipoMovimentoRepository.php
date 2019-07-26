<?php

namespace App\Repositories\Core\Eloquent;

use App\Models\TipoMovimento;
use App\Repositories\Core\BaseEloquentRepository;
use App\Repositories\Interfaces\TipoMovimentoRepositoryInterface;
use Illuminate\Http\Request;

class EloquentTipoMovimentoRepository extends BaseEloquentRepository implements TipoMovimentoRepositoryInterface
{
    public function entity() 
    {
        return TipoMovimento::class;
    }

    public function search(array $filters) 
    {
        return  $this->entity->where(function($query) use($filters){
            if(isset($filters['nome'])):
                $query->where('nome','like',"%{$filters['nome']}%");
            endif;
            
            if(isset($filters['tipo'])):
                $query->where('tipo','like',"%{$filters['tipo']}%");
            endif;
            
        })->paginate();
    }
    
    public function selectEntradas() 
    {
        return $this->entity->where('tipo','E')->pluck('nome','id');
    }
}

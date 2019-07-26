<?php

namespace App\Repositories\Core\Eloquent;

use App\Models\Conta;
use App\Repositories\Core\BaseEloquentRepository;
use App\Repositories\Interfaces\ContaRepositoryInterface;
use Illuminate\Http\Request;

class EloquentContaRepository extends BaseEloquentRepository implements ContaRepositoryInterface
{
    public function entity() 
    {
        return Conta::class;
    }

    public function search(array $filters) 
    {
        return  $this->entity->where(function($query) use($filters){
            if(isset($filters['nome'])):
                $query->where('nome','like',"%{$filters['nome']}%");
            endif;
            
            if(isset($filters['codigo'])):
                $query->where('codigo','like',"%{$filters['codigo']}%");
            endif;
            
        })->paginate();
    }
    
    public function selectContas() 
    {
        return $this->entity->pluck('nome', 'id');
    }

}

<?php

namespace App\Repositories\Core\Eloquent;

use App\Models\Equipamento;
use App\Repositories\Core\BaseEloquentRepository;
use App\Repositories\Interfaces\EquipamentoRepositoryInterface;

class EloquentEquipamentoRepository extends BaseEloquentRepository implements EquipamentoRepositoryInterface
{
    public function entity() 
    {
        return Equipamento::class;
    }
    
    public function search(array $filter) 
    {
        return $this->entity->where(function($query) use($filter){
            if(isset($filter['nome'])):
                $query->where('nome','like',"%{$filter['nome']}%");
            endif;
        })->paginate(10);
    }
    
    public function selectEquipamentos() 
    {
        return $this->entity->pluck('nome','id');
    }
}

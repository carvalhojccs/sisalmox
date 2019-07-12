<?php

namespace App\Repositories\Core\Eloquent;

use App\Models\Natureza;
use App\Repositories\Core\BaseEloquentRepository;
use App\Repositories\Interfaces\NaturezaRepositoryInterface;
use Illuminate\Http\Request;

class EloquentNaturezaRepository extends BaseEloquentRepository implements NaturezaRepositoryInterface
{
    public function entity() 
    {
        return Natureza::class;
    }

    public function search(array $filter) 
    {
        return $this->entity->where(function($query) use($filter){
            if($filter['nome']):
                $query->where('nome','like',"%{$filter['nome']}%");
            endif;
        })->paginate();
    }

}

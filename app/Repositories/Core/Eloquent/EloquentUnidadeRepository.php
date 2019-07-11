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

    public function search(array $data) 
    {
        return $this->entity->where(function($query) use($data){
            if($data['nome']):
                $query->where('nome','like',"%{$data['nome']}%");
            endif;
            
            if($data['sigla']):
                $query->orWhere('sigla','like',"%{$data['sigla']}%");
            endif;
            
        })->paginate();
    }

}

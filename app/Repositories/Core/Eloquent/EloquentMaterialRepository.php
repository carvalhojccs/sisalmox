<?php

namespace App\Repositories\Core\Eloquent;

use App\Models\Material;
use App\Repositories\Core\BaseEloquentRepository;
use App\Repositories\Interfaces\MaterialRepositoryInterface;
use Illuminate\Http\Request;

class EloquentMaterialRepository extends BaseEloquentRepository implements MaterialRepositoryInterface
{
    public function entity()
    {
        return Material::class;
    }

    public function search(array $filters)
    {
        return $this->entity->where(function($query) use($filters){
            if($filters['codigo']):
                $query->where('codigo','LIKE',"%{$filters['codigo']}%");
            endif;
            
            if($filters['descricao']):
                $query->orWhere('descricao','LIKE',"%{$filters['descricao']}%");
            endif;          
        })->paginate();
    }

}

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

    public function search(Request $request)
    {
        return $this->entity->where(function($query) use($request){
            if($request->part_number):
                $query->where('part_number','LIKE',"%{$request->part_number}%");
            endif;
            
            if($request->descricao):
                $query->orWhere('descricao','LIKE',"%{$request->descricao}%");
            endif;          
            
            if($request->provedor_id):
                $query->orWhere('provedor_id',$request->provedor_id);
            endif;
        })->paginate();
    }

}

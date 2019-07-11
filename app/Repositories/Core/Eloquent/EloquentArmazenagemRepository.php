<?php

namespace App\Repositories\Core\Eloquent;

use App\Models\Armazenagem;
use App\Repositories\Core\BaseEloquentRepository;
use App\Repositories\Interfaces\ArmazenagemRepositoryInterface;
use Illuminate\Http\Request;

class EloquentArmazenagemRepository extends BaseEloquentRepository implements ArmazenagemRepositoryInterface
{
    public function entity()
    {
        return Armazenagem::class;
    }

    public function search(Request $request)
    {
//        return $this->entity->where(function($query) use($request){
//            if($request->sigla):
//                $query->where('sigla','LIKE',"%{$request->sigla}%");
//            endif;
//            
//            if($request->nome):
//                $query->orWhere('nome','LIKE',"%{$request->nome}%");
//            endif;
//        })->paginate();
    }

}

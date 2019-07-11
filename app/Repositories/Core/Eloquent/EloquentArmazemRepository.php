<?php

namespace App\Repositories\Core\Eloquent;

use App\Models\Armazem;
use App\Repositories\Core\BaseEloquentRepository;
use App\Repositories\Interfaces\ArmazemRepositoryInterface;
use Illuminate\Http\Request;

class EloquentArmazemRepository extends BaseEloquentRepository implements ArmazemRepositoryInterface
{
    public function entity()
    {
        return Armazem::class;
    }

    public function search(Request $request)
    {
        
        return $this->entity->where(function($query) use($request){
            if($request->sigla):
                $query->where('sigla','LIKE',"%{$request->sigla}%");
            endif;
            
            if($request->nome):
                $query->orWhere('nome','LIKE',"%{$request->nome}%");
            endif;
        })->paginate();
    }

}

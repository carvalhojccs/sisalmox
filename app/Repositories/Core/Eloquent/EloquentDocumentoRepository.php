<?php

namespace App\Repositories\Core\Eloquent;

use App\Models\Documento;
use App\Repositories\Core\BaseEloquentRepository;
use App\Repositories\Interfaces\DocumentoRepositoryInterface;
use Illuminate\Http\Request;

class EloquentDocumentoRepository extends BaseEloquentRepository implements DocumentoRepositoryInterface
{
    public function entity()
    {
        return Documento::class;
    }

    public function search(array $filters)
    {
        return $this->entity->where(function($query) use($filters){
            if($filters['nome']):
                $query->where('nome','LIKE',"%{$filters['nome']}%");
            endif;
            
            if($filters['sigla']):
                $query->where('sigla','LIKE',"%{$filters['sigla']}%");
            endif;          
        })->paginate();
    }
    
    public function selectDocumentos() 
    {
        return $this->entity->pluck('nome','id');
    }

}

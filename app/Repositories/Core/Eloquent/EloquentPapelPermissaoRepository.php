<?php

namespace App\Repositories\Core\Eloquent;

use App\Models\PapelPermissao;
use App\Repositories\Core\BaseEloquentRepository;
use App\Repositories\Interfaces\PapelPermissaoRepositoryInterface;

class EloquentPapelPermissaoRepository extends BaseEloquentRepository implements PapelPermissaoRepositoryInterface
{
    public function entity()
    {
        return PapelPermissao::class;
    }

    public function search(array $filters)
    {
        
    }
}

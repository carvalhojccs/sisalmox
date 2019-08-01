<?php

namespace App\Repositories\Core\Eloquent;

use App\Models\PapelUser;
use App\Repositories\Core\BaseEloquentRepository;
use App\Repositories\Interfaces\PapelUserRepositoryInterface;

class EloquentPapelUserRepository extends BaseEloquentRepository implements PapelUserRepositoryInterface
{
    public function entity()
    {
        return PapelUser::class;
    }

    public function search(array $filters)
    {
        
    }
}

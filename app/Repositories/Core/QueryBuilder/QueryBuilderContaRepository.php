<?php

namespace App\Repositories\Core\QueryBuilder;

use App\Repositories\Core\BaseQueryBuilderRepository;
use App\Repositories\Interfaces\ContaRepositoryInterface;

class QueryBuilderContaRepository extends BaseQueryBuilderRepository implements ContaRepositoryInterface
{
    protected $getTable = 'contas';
}

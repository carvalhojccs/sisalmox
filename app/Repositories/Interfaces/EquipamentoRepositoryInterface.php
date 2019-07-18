<?php

namespace App\Repositories\Interfaces;

interface EquipamentoRepositoryInterface 
{
    public function entity();
    public function search(array $filter);
}

<?php

namespace App\Repositories\Interfaces;

interface RepositoryInterface 
{
    public function getAll();
    public function getSelect($value, $id);
    public function findById($id);
    public function findWhere($column,$value);
    public function findWhereFirst($column,$value);
    public function findWhereNotIn($column, $value);
    public function paginate($totalPage = 10);
    public function store(array $data);
    public function update($id, array $data);
    public function delete($id);
}

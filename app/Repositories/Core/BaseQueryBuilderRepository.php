<?php

namespace App\Repositories\Core;

use App\Repositories\Interfaces\RepositoryInterface;
use DB;

class BaseQueryBuilderRepository implements RepositoryInterface
{
    protected $getTable;
    
    public function __construct() 
    {
        $this->getTable = $this->resolveTable();
    }


    public function delete($id)
    {
        return DB::table($this->getTable)->where('id',$id)->delete();
    }

    public function findById($id) 
    {
        return DB::table($this->getTable)->find($id);
    }

    public function findWhere($column, $value) 
    {
        return DB::table($this->getTable)->where($column, $value)->get();
    }

    public function findWhereFirst($column, $value) 
    {
        return DB::table($this->getTable)->where($column, $value)->first();
    }

    public function getAll() 
    {
        return DB::table($this->getTable)->get();
    }

    public function paginate($totalPage = 10) 
    {
        return DB::table($this->getTable)->paginate($totalPage);
    }

    public function store(array $data) 
    {
        return DB::table($this->getTable)->insert($data);
    }

    public function update($id, array $data) 
    {
        return DB::table($this->getTable)->where('id',$id)->update($data);
    }
    
    public function resolveTable()
    {
        if(!property_exists($this, 'getTable')):
            throw new PropertyTableNotExists;
        endif;
        
        return $this->getTable;
    }

}

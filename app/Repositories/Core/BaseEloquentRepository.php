<?php

namespace App\Repositories\Core;

use App\Repositories\Interfaces\RepositoryInterface;
use App\Repositories\Exceptions\NoEntityDefined;

class BaseEloquentRepository implements RepositoryInterface
{
    protected $entity;
    
    public function __construct() 
    {
        $this->entity = $this->resolveEntity();
    }

    public function delete($id) 
    {
        return $this->entity->find($id)->delete();
    }
    
    public function deleteWhere($column, $value) 
    {
        return $this->entity->where($column, $value)->delete();
    }
    
    public function findById($id) 
    {
        return $this->entity->find($id);
    }

    public function findWhere($column, $value) 
    {
        return $this->entity->where($column , $value)->get();
    }

    public function findWhereFirst($column, $value) 
    {
        return $this->entity->where($column , $value)->first();
    }
    
    public function findWhereNotIn($column, $value) 
    {
        return $this->entity->whereNotIn($column , $value)->get();
        
    }

    public function getAll() 
    {
        return $this->entity->get();
    }
    
    public function getSelect($value, $id) 
    {
        return $this->entity->pluck($value, $id);
    }

    public function paginate($totalPage = 10) 
    {
        return $this->entity->paginate($totalPage);
    }

    public function store(array $data) 
    {
        return $this->entity->create($data);
    }

    public function update($id, array $data) 
    {
        $entity = $this->findById($id);
        return $entity->update($data);
    }
    
    // ...$relationships é a mesma coisa que array $relationships
    public function relationships(...$relationships)
    {
        $this->entity = $this->entity->with($relationships);
        
        return $this;
    }
    
    public function orderBy($column, $order = 'DESC')
    {
        $this->entity = $this->entity->orderBy($column, $order);
        return $this;
    }
    
        public function resolveEntity()
    {
        if(!method_exists($this, 'entity')):
            throw new NoEntityDefined;
        endif;
        
        return app($this->entity());
    }

}

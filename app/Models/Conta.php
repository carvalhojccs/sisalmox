<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Conta extends Model
{
    protected $table = 'contas';
    protected $fillable = ['codigo','nome'];
    
    public function naturezas() 
    {
        return $this->belongsToMany(Natureza::class);
    }
    
    public function materiais() 
    {
        return $this->hasMany(Material::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Natureza extends Model
{
    protected $table = 'naturezas';
    protected $fillable = ['codigo','descricao'];
    
    public function contas() 
    {
        return $this->belongsToMany(Conta::class);
    }
    
    public function movimentos() 
    {
        return $this->hasMany(Movimento::class);
    }
}

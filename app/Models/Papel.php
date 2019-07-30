<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Papel extends Model
{
    protected $table = 'papeis';
    protected $fillable = ['nome', 'descricao'];
    
    public function permissoes() 
    {
        return $this->belongsToMany(Permissao::class);
    }
}

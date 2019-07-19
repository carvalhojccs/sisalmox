<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Armazem extends Model
{
    protected $table = 'armazens';
    protected $fillable = ['nome','sigla'];
    
    public function armazenagens() 
    {
        return $this->hasMany(Armazenagem::class);
    }
}

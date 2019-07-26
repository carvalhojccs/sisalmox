<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Unidade extends Model
{
    protected $table = 'unidades';
    protected $fillable = ['nome','sigla'];
    
    public function materiais() 
    {
        return $this->hasMany(Material::class);
    }
}

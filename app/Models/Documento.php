<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Documento extends Model
{
    protected $table = 'documentos';
    protected $fillable = ['nome', 'sigla'];
    
    public function movimentos() 
    {
        return $this->hasMany(Movimento::class);
    }
}

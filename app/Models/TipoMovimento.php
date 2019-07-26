<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoMovimento extends Model
{
    protected $table = 'tipo_movimentos';
    protected $fillable = ['nome','tipo'];
    
    public function movimentos() 
    {
        return $this->hasMany(Movimento::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Armazenagem extends Model
{
    protected $table = 'armazenagens';
    protected $fillable = ['armazem_id','nome','sigla'];
    
    public function armazem() 
    {
        return $this->belongsTo(Armazem::class);
    }
}

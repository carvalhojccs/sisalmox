<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Local extends Model
{
    protected $table = 'locais';
    protected $fillable = ['nome','sigla'];
    
    public function users() 
    {
        return $this->hasMany(User::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PapelPermissao extends Model
{
    protected $table = 'papel_permissao';
    
    protected $fillable = ['permissao_id','papel_id'];
}

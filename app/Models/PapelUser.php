<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PapelUser extends Model
{
    protected $table = 'papel_user';
    
    protected $fillable = ['user_id', 'papel_id'];
}

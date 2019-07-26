<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Movimento extends Model
{
    protected $table = 'movimentos';
    protected $fillable = [
        'conta_id',
        'material_id',
        'tipo_movimento_id',
        'documento_id',
        'numero_documento',
        'data_documento',
        'estoque_anterior',
        'quantidade',
        'preco',
        'armazenagem_id',
        'user_id'
    ];
    
    public function material() 
    {
        return $this->belongsTo(Material::class);
    }
    
    public function natureza() 
    {
        return $this->belongsTo(Natureza::class);
    }
    
    public function documento() 
    {
        return $this->belongsTo(Documento::class);
    }
    
    public function tipoMovimento() 
    {
        return $this->belongsTo(TipoMovimento::class);
    }
}

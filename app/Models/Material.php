<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    protected $table = 'materiais';
    protected $fillable = [
        'conta_id',
        'unidade_id',
        'codigo',
        'descricao',
        'preco_atual',
        'estoque_atual',
        'estoque_minimo',
        'estoque_maximo',
        'ponto_reposicao',
        'ultima_compra',
        'ultima_saida',
        'prazo_compra'
        
    ];
    
    public function conta() 
    {
        return $this->belongsTo(Conta::class);
    }
    
    public function unidade() 
    {
        return $this->belongsTo(Unidade::class);    
    }
    
    public function movimentos() 
    {
        return $this->hasMany(Movimento::class);
    }
}

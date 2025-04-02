<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chamado extends Model
{
    protected $table = 'chamados';
    protected $fillable = [
        'titulo',
        'descricao',
        'prazo_solucao',
        'data_criacao',
        'data_solucao',
        'categoria_id',
        'situacao_id'
    ];

    // Relacionamento com Categoria (N:1)
    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    // Relacionamento com Situacao (N:1)
    public function situacao()
    {
        return $this->belongsTo(Situacao::class);
    }
}

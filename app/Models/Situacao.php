<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Situacao extends Model
{
    protected $table = 'situacoes'; 
    protected $fillable = ['status'];

    public function chamados()
    {
        return $this->hasMany(Chamado::class);
    }
}

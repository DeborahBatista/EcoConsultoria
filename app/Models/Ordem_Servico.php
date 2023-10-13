<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ordem_Servico extends Model
{
    use HasFactory;
    protected $table = 'ordem_servicos';

    protected $fillable = [
        'numero',
        'titulo',
        'descricao',
        'prioridade',
        'responsavel_id',
        'data_inicio',
        'data_fim',
        'status',
    ];

    public function responsavel()
    {
        return $this->belongsTo(Usuario::class, 'responsavel_id');
    }
}

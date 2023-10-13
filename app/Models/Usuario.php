<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'password',
        'grupo_id',
        'setor',
        'email',
        'telefone',
    ];

    public function grupo()
    {
        return $this->belongsTo(Grupo::class, 'grupo_id', 'id');
    }

    public function ordemServicos()
    {
        return $this->hasMany(Ordem_Servico::class, 'id', 'responsavel_id');
    }

    }


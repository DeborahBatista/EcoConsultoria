<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Grupo extends Model
{
    use HasFactory, HasRoles;

    protected $fillable = [
        'id,',
        'nome',
    ];

    public function usuarios()
    {
        return $this->hasMany(Usuario::class, 'grupo_id', 'id');
    }
}

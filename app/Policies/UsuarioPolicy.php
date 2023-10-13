<?php

namespace App\Policies;

use App\Models\Usuario;
use Illuminate\Auth\Access\HandlesAuthorization;

class UsuarioPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function viewAny(Usuario $user)
    {
        return $user->grupo_id == 1; // Apenas administradores podem ver a lista de usuários (nível 1)
    }

    public function create(Usuario $user)  
    {
        return $user->grupo_id == 1;
    }

    public function view(Usuario $usuario)
    {
        return in_array($usuario->grupo_id, [1,2]);
    }

    public function delete(Usuario $usuario)
    {
        return $user->grupo_id == 1;
    }

}


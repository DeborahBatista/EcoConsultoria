<?php

namespace App\Policies;

use App\Models\Usuario;
use App\Models\grupo;
use Illuminate\Auth\Access\HandlesAuthorization;

class GrupoPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        return $user->grupo_id == 1; // Apenas administradores (nível 1) podem visualizar a lista de usuários.
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\grupo  $grupo
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, grupo $grupo)
    {
        return $user->grupo_id == 1; // Apenas administradores (nível 1) podem visualizar a lista de usuários.
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->grupo_id == 1;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\grupo  $grupo
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, grupo $grupo)
    {
        return $user->grupo_id == 1;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\grupo  $grupo
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, grupo $grupo)
    {
        return $user->grupo_id == 1;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\grupo  $grupo
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, grupo $grupo)
    {
        return $user->grupo_id == 1;
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\grupo  $grupo
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, grupo $grupo)
    {
        return $user->grupo_id == 1;
    }
}
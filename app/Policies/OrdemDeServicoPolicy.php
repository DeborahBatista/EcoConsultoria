<?php

namespace App\Policies;

use App\Models\Usuario;
use App\Models\ordem_Servico;

class OrdemDeServicoPolicy
{
    public function view(Usuario $user, Ordem_Servico $OrdemServico)
    {
        return in_array($user->grupo_id, [1, 2, 3]);
    }

    public function create(Usuario $user)
    {
        return in_array($user->grupo_id, [2, 3]);
    }

    public function update(Usuario $user, Ordem_Servico $OrdemServico)
    {
        return in_array($user->grupo_id, [2, 3]);
    }

    public function delete(Usuario $user, Ordem_Servico $OrdemServico)
    {
        return $user->grupo_id == 1;
    }
}

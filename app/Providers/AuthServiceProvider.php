<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate; // Importe a classe Gate
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Policies\OrdemServicoPolicy;
use App\Policies\UsuarioPolicy;
use App\Policies\GrupoPolicy;
use App\Models\Ordem_Servico;
use App\Models\Usuario;
use App\Models\Grupo;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Ordem_Servico::class => OrdemServicoPolicy::class,
        Usuario::class => UsuarioPolicy::class,
        Grupo::class => GrupoPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::resource('ordem-servico', OrdemServicoPolicy::class);
        Gate::resource('usuarios', UsuarioPolicy::class);
        Gate::resource('grupos', GrupoPolicy::class);
    }
}

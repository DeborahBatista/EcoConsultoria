<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('password');
            $table->foreignId('grupo_id')->constrained('grupos');
            $table->string('setor');
            $table->string('email');
            $table->string('telefone');
            $table->timestamps();
        });

        $usuarios = [
             ['nome' => 'Administrador',
             'grupo_id' => 1,
             'setor' => 'Adm',
             'email' => 'Adm@adm.com',
             'telefone' => '(88) 8888-8888)',
             'password' => md5('senha_secreta'),]

        ];

          DB::table('usuarios')->insert($usuarios);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuarios');
    }
};

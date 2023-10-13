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
        Schema::create('grupos', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->integer('nivel')->unsigned()->default(2);
            $table->timestamps();
        });

        //Insere automaticamente três linhas na tabela "grupos"
        $grupos = [
            ['nome' => 'Administrador', 'nivel' => 0],
            ['nome' => 'Gerente', 'nivel' => 1],
            ['nome' => 'Funcionário', 'nivel' => 2],
        ];

        DB::table('grupos')->insert($grupos);
    }

    
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('grupos');
    }
};

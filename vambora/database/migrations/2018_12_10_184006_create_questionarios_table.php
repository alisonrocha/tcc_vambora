<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questionarios', function (Blueprint $table) {
            $table->increments('id'); 
            $table->text('acomodacao'); 
            $table->integer('avaliacaoAcomodacao');           
            $table->text('restaurante');
            $table->integer('avaliacaoRestaurante');       
            $table->text('passeio');
            $table->integer('avaliacaoPasseio');   
            $table->text('destino');
            $table->integer('idGrupo')->unsigned();            
            $table->foreign('idGrupo')->references('id')->on('grupos')->onDelete('cascade');   
            $table->integer('idUsuario')->unsigned();        
            $table->foreign('idUsuario')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('questionarios');
    }
}

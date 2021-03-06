<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParticipantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('participantes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idAdministrador');
            $table->string('nome', 100);
            $table->string('sobrenome', 100);
            $table->string('imagem');
            $table->boolean('questionario')->default(false);
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
        Schema::dropIfExists('participantes');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComentariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comentarios', function (Blueprint $table) {
            $table->increments('id');
            $table->text('comentario');   
            $table->string('nome', 100);
            $table->string('sobrenome', 100);         
            $table->integer('idMensagem')->unsigned();            
            $table->foreign('idMensagem')->references('id')->on('mensagems')->onDelete('cascade');
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
        Schema::dropIfExists('comentarios');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateViagemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('viagems', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('idUsuario')->unsigned();
            $table->string('destino');
            $table->string('tipo');
            $table->string('transporte');
            $table->string('hospedagem');
            $table->date('dataInicial');
            $table->date('dataFinal');
            $table->string('roteiro');            
            $table->foreign('idUsuario')->references('id')->on('users')->onDelete('cascade');
            // $table->date('dataViagem');
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
        Schema::dropIfExists('viagems');
    }
}

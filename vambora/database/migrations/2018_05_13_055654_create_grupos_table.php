<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGruposTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grupos', function (Blueprint $table) {
           $table->increments('id');            
            $table->integer('idViagem')->unsigned();            
            $table->foreign('idViagem')->references('id')->on('viagems')->onDelete('cascade');         
            $table->integer('idUsuario')->unsigned();           
            $table->foreign('idUsuario')->references('id')->on('users')->onDelete('cascade');   
            $table->string('nomeGrupo');       
            $table->boolean('status')->default(true);
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
        Schema::dropIfExists('grupos');
    }
}

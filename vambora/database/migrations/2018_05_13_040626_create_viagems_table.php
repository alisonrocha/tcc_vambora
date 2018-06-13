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
           $table->increments('id');
          //  $table->integer('user_id');
            $table->string('destino');
            $table->string('transporte');
            $table->string('hospedagem');
            $table->date('data_inicial');
            $table->date('data_final');
            $table->string('roteiro');
            $table->integer('limite_pessoas');
          //  $table->foreign('user_id')->references('id')->on('users');
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

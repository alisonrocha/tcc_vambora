<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->string('sobrenome', 100);
            $table->date('data_nascimento');
            $table->string('facebook');
            $table->string('instagram');

            //Autenticação Usuário
            $table->string('email',80)->unique();
            $table->string('senha',254)->nullable();

            //Permissão 
            $table->string('status')->default('ativo');

            $table->rememberToken();
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
        Schema::table('users', function (Blueprint $table) {

        )};

        Schema::dropIfExists('users');
    }
}

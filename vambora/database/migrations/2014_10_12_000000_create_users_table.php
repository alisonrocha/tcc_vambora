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
            $table->increments('id')->unique();
            $table->string('nome', 100);
            $table->string('sobrenome', 100);
            $table->date('dataNascimento');
            $table->string('sexo');
            $table->string('facebook');
            $table->string('instagram');

            //Autenticação Usuário
            $table->string('email',150)->unique();
            $table->string('senha',100);

            //Permissão
            $table->boolean('status')->default(true);
            //Lembrete de senha
            $table->rememberToken();
            $table->timestamps();
            //data criação
            // $table->date('dataCadastro');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::dropIfExists('users');
    }
}

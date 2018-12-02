<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\User;
use App\Notifications\resetSenha;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

     //A variável fillable define quais os campos que podem ser inseridos pelo usuário do sistema no Banco
     protected $fillable = [
         'name', 
         'email', 
         'password',
         'imagem'
    ];
     //guarded protege os campos de inserções. Ele impede que alguém insira dados em alguns campos da nossa tabela.
     protected $guarded = ['id', 'created_at', 'update_at'];
     protected $table = 'users';

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    //Uma viagem terá um usuário
    public function viagem(){
        return $this->hasMany(Viagem::class, 'user_id');
    }
    
    //Uma usuário terá várias notificações
    public function notificacao(){
      return $this->hasMany(Notificacao::class, 'user_id');
    }
}

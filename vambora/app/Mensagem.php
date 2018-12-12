<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mensagem extends Model
{
    protected $fillable = [
        'mensagem',
        'nome',
        'sobrenome',
        'imagem'                
     ];
 
    //Vários Mensagens pertence a um Grupo
     public function grupo(){
        return $this->belongsToMany(Grupo::class, 'idGrupo');
    }

    //Vários Mensagens pertence a um Usuário
    public function user(){
        return $this->belongsTo(User::class, 'id');
    }
    //uma Mensagem terá vários comentários
    public function comentario(){
        return $this->hasMany(Comentario::class, 'idMensagem');
    }
        
}

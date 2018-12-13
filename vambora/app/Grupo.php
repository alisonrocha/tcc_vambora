<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    protected $fillable = [     
        'id',
        'idViagem',
        'idGrupo',
        'nomeGrupo'           
    ];

    protected $table = "grupos";

    //Uma GRUPO pertence a uma VIAGEM
    public function viagem(){
        return $this->belongsTo(Viagem::class, 'idViagem');
    }
    //Várias MENSAGENS pertence a um GRUPO
    public function mensagem(){
        return $this->hasMany(Mensagem::class, 'idGrupo');
    }
    //Vários Participantes pertence a um Grupo
    public function participante(){
        return $this->hasMany(Participante::class, 'idGrupo');
    }
}

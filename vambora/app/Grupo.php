<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    protected $fillable = [
       'nomeGrupo',
       'tipo'
    ];

    //Um Grupo Pertence a uma viagem
    public function viagem(){
        return $this->hasOne(Viagem::class, 'idViagem');
    }
}

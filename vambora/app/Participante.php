<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Participante extends Model
{
    protected $fillable = [
        'idAdministrador',
        'idGrupo',
        'idUsuario'               
     ];
    
    //Vários Participantes pertence a um Grupo
    public function viagem(){
        return $this->belongsTo(Viagem::class, 'id');
    }
   
}

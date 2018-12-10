<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Participante extends Model
{
    protected $fillable = [
        'idAdministrador',
        'idGrupo',
        'idUsuario',
        'nome',
        'sobrenome',
        'imagem'               
     ];
    
    //Vários Participantes pertence a um Grupo
    public function viagem(){
        return $this->belongsTo(Viagem::class, 'id');
    }

     //Uma Usuario pertence a uma Participante
     
    public function user(){
        return $this->hasMany(User::class, 'id');
    }
    

    


   
}

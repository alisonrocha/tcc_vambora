<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    protected $fillable = [
        'comentario',
        'nome',
        'sobrenome'                  
    ];

     //Vários comentários pertence a uma Mensagem
     public function mensagem(){
        return $this->belongsTo(Mensagem::class, 'id');
    }
     
}

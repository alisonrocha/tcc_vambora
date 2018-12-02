<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notificacao extends Model
{
    protected $fillable = [
        'idUsuario',
        'link',
        'text',
     ];

    protected $table = "notificacoes";

    //Vários Participantes pertence a um Grupo
    public function user(){
        return $this->belongsTo(Usuario::class, 'id');
    }
}

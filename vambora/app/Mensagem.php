<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mensagem extends Model
{
    protected $fillable = [
        'mensagem'               
     ];
 
     public function grupo(){
        return $this->belongsToMany(Grupo::class, 'idGrupo');
    }
     
}

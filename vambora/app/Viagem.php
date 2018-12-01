<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Viagem;

class Viagem extends Model
{
    protected $fillable = [
        'destino',
        'tipo',
        'transporte',
        'hospedagem',
        'dataInicial',
        'dataFinal',
        'roteiro'        
    ];

    public $rules = [
        'destino'           =>'required|min:3|max:50',
        'transporte'        =>'required',
        'hospedagem'        =>'required',
        'dataInicial'      =>'required',
        'dataFinal'        =>'required',
        'roteiro'           =>'required|min:3|max:300',   
    ];

    protected $table = "viagems";

	//Um usuário Pertence a várias viagens
    public function user(){
        return $this->belongsTo(User::class, 'idGrupo');
    }   

    public function grupos(){
        return $this->hasOne(Grupo::class, 'idViagem');
    }

    public function grupo(){
        return $this->belongsTo(Grupo::class, 'idViagem');
    }

    //Vários Participantes pertence a um Grupo
    public function participantes(){
        return $this->hasMany(Participante::class, 'idGrupo');
    }
}

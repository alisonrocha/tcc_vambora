<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Viagem extends Model
{

	//Um usuário pode cadastrar várias viagens
     public function users()
    {
        //return $this->belongsTo('App\User');
    }
}

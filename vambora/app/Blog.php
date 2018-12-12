<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = [     
        'id',
        'idUsuario',
        'titulo',
        'texto'           
    ];

    protected $table = "blogs";

     //Várias Histórias pertence a um Usuario
     public function user(){
        return $this->belongsTo(User::class, 'id');
    }

}

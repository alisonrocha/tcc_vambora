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

}

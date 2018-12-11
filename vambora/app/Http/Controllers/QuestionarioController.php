<?php

namespace App\Http\Controllers;

use App\Questionario;
use Illuminate\Http\Request;
use App\Http\Controllers\Grupo;
use App\Viagem;

class QuestionarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public static function questionario(Request $request, Questionario $questionario){
        $nome_viagem = Viagem::where('id', $request->idGrupo)->first(); 

        $questionario->acomodacao = $request->acomodacao;
        $questionario->restaurante = $request->restaurante;
        $questionario->passeio = $request->passeio;     
        $questionario->idUsuario =  session()->get('logado.id'); 
        $questionario->idGrupo = $request->idGrupo;   
        $questionario->destino =  $nome_viagem->destino;             
        $questionario->save();               
        
        return GrupoController::index($questionario->idGrupo);
    }


}

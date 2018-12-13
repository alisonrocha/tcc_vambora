<?php

namespace App\Http\Controllers;

use App\Questionario;
use Illuminate\Http\Request;
use App\Http\Controllers\Grupo;
use App\Viagem;
use App\Participante;

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

    public static function questionario(Request $request, Questionario $questionario, Participante $participante){
        $nome_viagem = Viagem::where('id', $request->idGrupo)->first(); 
        $participante = Participante::where('idUsuario', session()->get('logado.id'))
        ->update(['questionario' => 1]);          

        $questionario->acomodacao = $request->acomodacao;
        $questionario->avaliacaoAcomodacao = $request->avaliacaoAcomodacao;
        $questionario->restaurante = $request->restaurante;
        $questionario->avaliacaoRestaurante = $request->avaliacaoRestaurante;
        $questionario->passeio = $request->passeio;  
        $questionario->avaliacaoPasseio = $request->avaliacaoPasseio;   
        $questionario->idUsuario =  session()->get('logado.id'); 
        $questionario->idGrupo = $request->idGrupo;   
        $questionario->destino =  $nome_viagem->destino;             
        $questionario->save();               
        
        return GrupoController::index($questionario->idGrupo);
    }


}

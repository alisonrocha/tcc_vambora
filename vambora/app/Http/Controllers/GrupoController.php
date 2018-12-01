<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Grupo;
use  App\Viagem;
use App\Mensagem;
use App\Participante;
use DB;



class GrupoController extends Controller
{  
    public function index($id){
       
        $query = Mensagem::where('idGrupo', $id)
                ->latest()                      
                ->get();          
      
        //Verificar User
        $queryGrupo = Viagem::where('id', $id)->get();             

        $idGrupo = $id;

        return view('painel.grupo.grupo')->with(compact('query', 'idGrupo','queryGrupo'));
    }

    public function pesquisar(Request $request){

        $resultado = Viagem::where('destino', 'LIKE' , '%'.$request->pesquisa.'%')
        ->with('participantes')
        ->get();   
        
        

        //Busca Grupos
        $resultado = Viagem::where('destino', 'LIKE' , '%'.$request->pesquisa.'%')->get(); 
        //Busca participantes        
        
        return view('painel.viagem.pesquisar')->with(compact('resultado'));        
    }

    public function participar($id, Participante $participante){  
        $admin = Viagem::find($id);        
        $participante->idAdministrador = $admin->idUsuario;
        $participante->idGrupo = $id;        
        $participante->idUsuario = session()->get('logado.id');  
        $participante->save();      

        return GrupoController::index($participante->idGrupo);       
    }

    public function mensagem(Request $request, Mensagem $mensagem){       
        $mensagem->mensagem = $request->mensagem;   
        $mensagem->idUsuario = $request->idUsuario; 
        $mensagem->idGrupo = $request->idGrupo;     
        $mensagem->save();       

        return GrupoController::index($mensagem->idGrupo);
    }
}

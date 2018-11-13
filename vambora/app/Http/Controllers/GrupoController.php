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
       
        $query = DB::table('mensagems')                            
                ->where('IdGrupo', $id )
                ->latest()                      
                ->get();          
      
        //Verificar User
        $queryGrupo = Viagem::where('id', $id)->get();                     

        $idGrupo = $id;

        return view('grupo.grupo')->with(compact('query', 'idGrupo','queryGrupo'));
    }

    public function pesquisar(Request $request){

        //Busca Grupos
        $resultado = Viagem::where('destino', 'LIKE' , '%'.$request->pesquisa.'%')->get(); 
        $participantes = Participante::select()->get(); 
        
        return view('viagem.pesquisar')->with(compact('resultado', 'participante'));
        
    }

    public function participar($id, Participante $participante){         
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

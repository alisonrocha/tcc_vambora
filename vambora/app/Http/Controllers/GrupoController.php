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
        $queryUser = DB::table('grupos')
                     ->where('id', $id )
                     ->get();        

        $idGrupo = $id;       

        return view('grupo.grupo')->with(compact('query', 'idGrupo'));
    }

    public function pesquisar(Request $request){

        //Busca Grupos
        $resultado = Viagem::where('destino', 'LIKE' , '%'.$request->pesquisa.'%')->get(); 
        $participantes = Participante::select()->get(); 
       

        //Pega id pela sessão
        $id = session()->get('logado.id'); 
        $user[] = 0;
        $participante[] = 0;

        //Grava os id dos grupos que ele criou
        for($i=0; $i < count($resultado); $i++){
            if($resultado[$i]['idViagem'] == $id){                
                $user[] = $resultado[$i]['idViagem'];                              
            }             
        }        

        $participantes = Participante::where('idUsuario', $id)->get(); 
        for($i=0; $i < count($participantes); $i++){
            if($participantes[$i]['idUsuario'] == $id){                
                $participante[] = $participantes[$i]['idGrupo'];                              
            }             
        } 

        
        return view('viagem.pesquisar')->with(compact('resultado', 'user', 'participante'));
        
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

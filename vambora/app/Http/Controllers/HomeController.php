<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use  App\Grupo;
use App\Participante;

class HomeController extends Controller
{
   
    public function index()
    {     
        if(session()->has('logado')){  
            //Quantidade de grupos Criados
            $grupoCadastrado = Grupo::where('idUsuario', session()->get('logado.id'))->get();  
            $qtdGrupo = count($grupoCadastrado);           
            session()->put('qtdGrupo', $qtdGrupo); 
            //Quantidade de grupos Particpantes
            $grupoParticipante  = Participante::where('idUsuario', session()->get('logado.id'))->get(); 
            $qtdParticipando = count($grupoParticipante);                  
            session()->put('qtdParticipando', $qtdParticipando); 
            
            return view('home');       
        }else{
            return view('usuario.login');
        }        
    }

    public function cadastrarViagem(){
        if(session()->has('logado')){        
            return view('viagem.cadastrarViagem');       
        }else{
            return view('usuario.login');
        }     
    

    }

    public function login(){
    	return view('usuario.login');
    }
   
}

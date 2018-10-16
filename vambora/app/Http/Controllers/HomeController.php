<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use  App\Grupo;

class HomeController extends Controller
{
   
    public function index()
    {     
        if(session()->has('logado')){        
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

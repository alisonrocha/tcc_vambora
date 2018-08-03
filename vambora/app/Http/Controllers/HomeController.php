<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use  App\Grupo;

class HomeController extends Controller
{
   
    public function index()
    {
        //Query Grupos ativos
        $query = DB::table('grupos')                            
                ->where('status', 1)
                ->get();

        $total = $query->count();       
        
        //Query Grupos Nacional
        $queryN = DB::table('grupos')                           
                ->where('tipo', 'nacional')
                ->get();

                $totalN = $queryN->count();         

        //Query Grupos Internacionais

        $queryI = DB::table('grupos')                  
                ->where('tipo', 'internacional')
                ->get();

        $totalI = $queryI->count(); 

        //Query Grupos Intercâmbio

        $queryC = DB::table('grupos')                  
                ->where('tipo', 'intercambio')
                ->get();

        $totalC = $queryC->count();         

        return view('home')->with(compact('total','totalN','totalI','totalC' ));
    }

    public function cadastrarViagem(){
    	return view('viagem.cadastrarViagem');

    }

    public function login(){
    	return view('usuario.login');
    }
   
}

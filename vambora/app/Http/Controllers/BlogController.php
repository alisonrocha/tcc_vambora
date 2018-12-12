<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Blog;
use App\User;

class BlogController extends Controller
{
    public function index(){

        $resultado = User::select()
        ->with('blog')
        ->get();       
        
         

        return view('painel.blog.blog')->with(compact('resultado'));;
    }

    public function cadastrar(Request $request, Blog $blog){      
        $blog->texto = $request->texto; 
        $blog->titulo = $request->titulo; 
        $blog->idUsuario = session()->get('logado.id');       
        $blog->save();    

        alert()->success('História Cadastrada!');

        return  BlogController::index();
    }
}

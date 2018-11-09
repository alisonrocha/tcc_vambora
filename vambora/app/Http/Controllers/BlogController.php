<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Blog;

class BlogController extends Controller
{
    public function index(){
        $resultado = Blog::select()->get();    

       
        return view('blog.blog')->with(compact('resultado'));;
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

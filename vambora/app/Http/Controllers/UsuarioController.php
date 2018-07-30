<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\User;
use Carbon\Carbon;
use  Alert;
use Illuminate\Support\Facades\DB;

class UsuarioController extends Controller
{
  
  public function index(){
    return view('cadastro.cadastroUsuario');
  }

  /**
  *==============================================================
  *FUNÇÃO CADASTRAR USUÁRIO
  *==============================================================
  **/
  public function cadastrar(Request $request, User $user){
    if($request == NULL){
      return 'Campo em Branco!';
    }else{
      //Converter data
      $data = $request->data_nascimento;
      $data_formatada = Carbon::parse($data)->format('Y/m/d');
      //Salvar tabela uuarios
      $user->nome = $request->nome;
      $user->sobrenome = $request->sobrenome;
      $user->sexo = $request->sexo;
      $user->dataNascimento = $data_formatada;
      $user->facebook = $request->facebook;
      $user->instagram = $request->instagram;
      $user->email = $request->email;
      //Criptografar senha
      $user->senha = md5($request->senha);
      $user->save();
      //alert de SUCESSO
      alert()->success('Usuário Cadastrado com sucesso');
      //Retorna view cadastro usuario
      return view('/cadastro/cadastroUsuario');
    }
  }

  /**
  *==============================================================
  *FUNÇÃO AUTENTICAR USUÁRIO
  *==============================================================
  **/
  public function autenticacao(Request $request){
    //validar campo antes de chamar no Banco
    $user = User::where('email', $request->email)
                ->where('senha',md5($request->senha))
                ->where('status', '1')
                ->first();
    //Se variavel retornar nulo, alert e será redircionado para view de login
    if($user === NULL){
      alert()->error('E-mail ou Senha inválido!');
      return view('user.login');
    }else{
      session()->put('logado', $user);
      return redirect("/");
    }
  }

  /**
  *==============================================================
  *FUNÇÃO SAIR
  *==============================================================
  **/
  public function sair(){
    session()->flush();
    alert()->message('', 'Tchau!!!');
    return redirect('/');
  }

  /**
  *==============================================================
  *FUNÇÃO EDITAR USUÁRIO
  *==============================================================
  **/
  public function editar(){
    return view('/user/editarUsuario');
  }

  /**
  *==============================================================
  *FUNÇÃO MOSTRAR PERFIL USUÁRIO
  *==============================================================
  **/
  public function perfil(){
    return view('/user/perfilUsuario');
  }   
}

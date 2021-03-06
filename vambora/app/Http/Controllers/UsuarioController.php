<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\User;
use  App\Grupo;
use  App\Participante;
use Carbon\Carbon;
use  Alert;
use Illuminate\Support\Facades\DB;
use App\Notifications\resetSenha;

class UsuarioController extends Controller
{
  
  public function index(){
    return view('painel.usuario.cadastro');
  }

  /**
  *==============================================================
  *FUNÇÃO CADASTRAR USUÁRIO
  *==============================================================
  **/
  
  public function cadastrar(Request $request, User $user){

      
      //Converter data
      $data = $request->data_nascimento;
      $data_formatada = Carbon::parse($data)->format('Y/m/d');

      //Salvando Imagem   
      if($request->imagem === null){
        $imagem = "users/semfoto.png";
        $user->imagem =  $imagem;
             
      }else{
        if($request->hasFile('imagem') && $request->file('imagem')->isValid()){        

          $name = kebab_case($request->nome).kebab_case($request->sobrenome);   
          $extensao = $request->imagem->extension();
          $nameFile = "{$name}.{$extensao}";        
          
          $upload = $request->imagem->storeAs('users', $nameFile, 'pictures');

          $user->imagem = "users/".$nameFile;
         
          if(!$upload){
            return redirect()
            ->back()
            ->with('error', 'Falha ao fazer o upload da Imagem');
          }     
        }  
      } 
      
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
      return view('painel.usuario.login');
    
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
      return view('painel.usuario.login');
    }else{
      session()->put('logado', $user);
      alert()->message('Bem Vindo '.$user->nome);
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
  public function editar($id){  

    $result = User::find($id);    

    $title = "Editar Perfil";    

    return view('painel.usuario.cadastro')->with(compact('result', 'title'));    
    
  }

  public function update(Request $request){  

    $id = session()->get('logado.id');

    $user = User::find($id);    

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
     $user->update();
     //alert de SUCESSO
     alert()->success('Perfil Atualizado');

     //Retorna view cadastro usuario
     return redirect('perfil'); 

     
    
  }



  /**
  *==============================================================
  *FUNÇÃO MOSTRAR PERFIL USUÁRIO
  *==============================================================
  **/
  public function perfil(){
    return view('painel.usuario.perfil');
  } 
  
  /**
  *==============================================================
  *FUNÇÃO RESET SENHA
  *==============================================================
  **/

  public function recuperar(Request $request)
  {
    
    $user = User::where('email', $request->email)                
                ->where('status', '1')
                ->first(); 
    
    if($user){
       $chave = md5($user['id'].$user['senha']);  
       dd($chave);     
    }else{
      alert()->message('E-mail não cadastrado, digitar um e-mail válido!');
      return redirect("/");
    }
      
  }

 /**
  *==============================================================
  *FUNÇÃO DELETAR USUARIO
  *==============================================================
  **/

  public function destroy()
    {
        $user = User::findOrFail(session()->get('logado.id'));
        $user->delete(); 
        $viagem = Viagem::where('idUsuario', session()->get('logado.id'));
        $viagem->delete(); 
        session()->flush();    
        alert()->message('Conta Excluida com sucesso!');
        return redirect('/');
    }
    
    
  /**
  *==============================================================
  *FUNÇÃO RETORNA NÚMERO DE GRUPOS CADASTRADOS
  *==============================================================
  **/
  public function numeroGrupoCadastrados($id){
    $grupoCadastrado = Grupo::where('idUsuario', $id)->get();
    $qtdGrupo = count($grupoCadastrado);

    return response()->json([
        'num_grupos_cadastrados' => $qtdGrupo
    ]);
  }


  /**
  *==============================================================
  *FUNÇÃO RETORNA NÚMERO DE GRUPOS PARTICIPANDO
  *==============================================================
  **/
  public function numeroGrupoParticipando($id){
    $grupoParticipante = Participante::where('idUsuario', $id)->get();
    $qtdParticipando = count($grupoParticipante);

    return response()->json([
        'num_grupos_participando' => $qtdParticipando
    ]);
  }

}

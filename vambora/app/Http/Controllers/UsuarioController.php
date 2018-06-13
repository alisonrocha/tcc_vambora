<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\User;
use Carbon\Carbon;
use  Alert;
use Illuminate\Support\Facades\DB;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){

    }

    //Function autenticacao de usuario
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

    public function logout(){
      session()->flush();
      alert()->message('', 'Tchau!!!');
      return redirect('/');
    }

    public function cadastrarUsuario(){
      return view('/cadastro/cadastroUsuario');
    }

    public function editarUsuario(){
      return view('/user/editarUsuario');
    }

    public function perfilUsuario(){
      return view('/user/perfilUsuario');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, User $user)
    {
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
        $user->data_nascimento = $data_formatada;
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

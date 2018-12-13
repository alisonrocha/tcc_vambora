<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Grupo;
use App\Viagem;
use App\Mensagem;
use App\Participante;
use App\Comentario;
use App\User;
use App\Questionario;
use DB;



class GrupoController extends Controller
{
    public static function index($id){

        //BUSCA DE MENSAGENS
        $query = Mensagem::where('idGrupo', $id)
                ->with('comentario')
                ->latest()
                ->get();




        //BUSCA DE DADOS DO GRUPO
        $queryGrupo = Viagem::where('id', $id)
                    ->with('participantes')
                    ->get();

        //BUSCA DADOS DO QUESTIONÁRIO
        $nome_viagem = Viagem::where('id', $id)->first();

        $query_questionario = Questionario::where('destino', $nome_viagem->destino)->get();

        $idGrupo = $id;

        return view('painel.grupo.grupo')->with(compact('query', 'idGrupo','queryGrupo','participante', 'query_questionario'));
    }

    public function pesquisar(Request $request){

        $resultado = Viagem::where('destino', 'LIKE' , '%'.$request->pesquisa.'%')
        ->with('participantes')
        ->get();



        $resultado = Viagem::where('destino', 'LIKE' , '%'.$request->pesquisa.'%')->get();


        return view('painel.viagem.pesquisar')->with(compact('resultado'));
    }

    public function participar($id, Participante $participante){
        $user = Participante::where('idUsuario', session()->get('logado.id') )->first();

        if($user == true){
            alert()->message('Usuario Participando!');
        }else{
            $admin = Viagem::find($id);
            $participante->nome =   session()->get('logado.nome');
            $participante->sobrenome =   session()->get('logado.sobrenome');
            $participante->imagem =   session()->get('logado.imagem');
            $participante->idAdministrador = $admin->idUsuario;
            $participante->idGrupo = $id;
            $participante->idUsuario = session()->get('logado.id');
            $participante->save();
        }

        return GrupoController::index($participante->idGrupo);
    }

    public function mensagem(Request $request, Mensagem $mensagem){
        $mensagem->mensagem = $request->mensagem;
        $mensagem->idUsuario = $request->idUsuario;
        $mensagem->idGrupo = $request->idGrupo;
        $mensagem->nome =   session()->get('logado.nome');
        $mensagem->sobrenome =   session()->get('logado.sobrenome');
        $mensagem->imagem =   session()->get('logado.imagem');
        $mensagem->save();

        return GrupoController::index($mensagem->idGrupo);
    }

    public function comentario(Request $request, Comentario $comentario){

        $user = User::find($request->idUsuario);

        $comentario->nome = $user->nome;
        $comentario->sobrenome = $user->sobrenome;
        $comentario->imagem = $user->imagem;
        $comentario->comentario = $request->comentario;
        $comentario->idUsuario = $request->idUsuario;
        $comentario->idGrupo = $request->idGrupo;
        $comentario->idMensagem = $request->idMensagem;
        $comentario->save();

        return redirect("grupo/$comentario->idGrupo");
    }

    public function gruposCadastrados(){
        $resultado = Viagem::where('idUsuario', session()->get('logado.id'))->get();

        return view('painel.grupo.gruposCadastrados')->with(compact('resultado'));
    }

    public function gruposParticipando(){
        $resultado  = Participante::where('idUsuario', session()->get('logado.id'))
        ->with('viagem')
        ->get();

        return view('painel.grupo.gruposParticipando')->with(compact('resultado'));
    }

    public function destroy(){
        $user = Participante::where('idUsuario', session()->get('logado.id'))->delete();
        alert()->message('Você não faz mais parte do Grupo!');
        return view('painel.home');
    }

    public function perfilParticipante($id){
        $participante = Participante::where('id', $id)->first();
        $user = User::where('id', $participante->idUsuario)->first();

        return view('painel.grupo.perfilParticipante')->with(compact('user'));
    }

    public function comentar($idMensagem, Request $request){
        if(session()->has('logado')){
            if(session()->get('logado.id') == $request->idUsuario) {
                $user = User::find($request->idUsuario);
                $comentario = new Comentario();

                $comentario->nome = $user->nome;
                $comentario->sobrenome = $user->sobrenome;
                $comentario->imagem = $user->imagem;
                $comentario->comentario = $request->comentario;
                $comentario->idUsuario = $request->idUsuario;
                $comentario->idGrupo = $request->idGrupo;
                $comentario->idMensagem = $idMensagem;
                if ($comentario->save()) {
                    return response()->json([
                        'code' => '201',
                        'status' => 'OK'
                    ], 201);
                } else {
                    return response()->json([
                        'code' => '500',
                        'status' => 'Internal Server Error'
                    ], 500);
                }
            } else {
                return response()->json([
                    'code' => '401',
                    'status' => 'Unauthorized'
                ], 401);
            }
        } else {
            return response()->json([
                'code' => '401',
                'status' => 'Unauthorized'
            ], 401);
        }
    }

    public function comentarios($idMensagem){
        if(session()->has('logado')){
            $mensagem = Mensagem::find($idMensagem);

            if ($mensagem !== null) {
                return response()->json($mensagem->comentario, 200);
            } else {
                return response()->json([
                    'code' => '500',
                    'status' => 'Internal Server Error'
                ], 500);
            }
        } else {
            return response()->json([
                'code' => '401',
                'status' => 'Unauthorized'
            ], 401);
        }
    }

    public function mensagens($idGrupo){
        if(session()->has('logado')){
            $grupo = Grupo::find($idGrupo);

            if ($grupo !== null) {
                return response()->json($grupo->mensagem, 200);
            } else {
                return response()->json([
                    'code' => '500',
                    'status' => 'Internal Server Error'
                ], 500);
            }
        } else {
            return response()->json([
                'code' => '401',
                'status' => 'Unauthorized'
            ], 401);
        }
    }
}

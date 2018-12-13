<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use  App\Viagem;
use  App\Grupo;
use App\Participante;
use Carbon\Carbon;
use  Alert;
use DB;

class ViagemController extends Controller
{

  public function index(){ 
    if(session()->has('logado')){        
      return view('painel.viagem.cadastrar');       
    }else{
      return view('painel.usuario.login');
    }
  }

  /**
    *============================================================== 
    *FUNÇÃO CADASTRAR VIAGEM
    *==============================================================
  **/
  public function cadastrar(Request $request, Viagem $viagem, Grupo $grupo, Participante $participante) {   

    if($request == NULL){
      return 'Campo em Branco!';
    }else{      
      //Converter data
      $data_inicial = $request->data_inicial;
      $data_formatada_inicial = Carbon::parse($data_inicial)->format('Y/m/d');
      $data_final = $request->data_final;
      $data_formatada_final = Carbon::parse($data_final)->format('Y/m/d');
      //Salvar tabela uuarios
      $viagem->destino = $request->destino;
      $viagem->tipo = $request->tipo;
      $viagem->transporte = $request->transporte;
      $viagem->hospedagem = $request->hospedagem;
      $viagem->dataInicial = $data_formatada_inicial;
      $viagem->dataFinal =  $data_formatada_final;
      $viagem->roteiro = $request->roteiro;    
      $viagem->idUsuario = session()->get('logado.id');     
      $viagem->save();

      //Cadastrar Tabela Grupo    
      $grupo->idViagem = $viagem->id;
      $grupo->idUsuario = $viagem->idUsuario;  
      $grupo->nomeGrupo = $viagem->destino;          
      $grupo->save();

      //Cadastrar na tabela Participante
      $participante->nome =   session()->get('logado.nome');
      $participante->sobrenome =   session()->get('logado.sobrenome');
      $participante->imagem =   session()->get('logado.imagem');
      $participante->idAdministrador = $admin->idUsuario;
      $participante->idGrupo = $viagem->id;       
      $participante->idUsuario = session()->get('logado.id');  
      $participante->save();    


      alert()->success('Viagem Cadastrada com sucesso');
      return view('painel.viagem.cadastrar');
    }
  }

 /**
  *==============================================================
  *FUNÇÃO EDITAR USUÁRIO
  *==============================================================
  **/

  public function editar($id){  

    $result = Viagem::find($id);

    $title = "Editar Viagem";    

    return view('painel.viagem.cadastrar')->with(compact('result', 'title'));    
    
  }

  public function update(Request $request){     

    $id = $request->idViagem;
    
    $viagem = Viagem::find($id);    

    $data_inicial = $request->data_inicial;
    $data_formatada_inicial = Carbon::parse($data_inicial)->format('Y/m/d');
    $data_final = $request->data_final;
    $data_formatada_final = Carbon::parse($data_final)->format('Y/m/d');
    //Salvar tabela uuarios
    $viagem->destino = $request->destino;
    $viagem->tipo = $request->tipo;
    $viagem->transporte = $request->transporte;
    $viagem->hospedagem = $request->hospedagem;
    $viagem->dataInicial = $data_formatada_inicial;
    $viagem->dataFinal =  $data_formatada_final;
    $viagem->roteiro = $request->roteiro;     
    $viagem->update(); 

    //alert de SUCESSO
    alert()->success('Viagem Atualizado');
    //Retorna view cadastro usuario
    return view('painel.viagem.cadastrar');     
  }
}

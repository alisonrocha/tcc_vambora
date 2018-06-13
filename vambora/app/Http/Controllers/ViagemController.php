<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use  App\Viagem;
use Carbon\Carbon;
use  Alert;
use DB;

class ViagemController extends Controller
{

  public function index(){

  return view('viagem.search');

  }



  public function store(Request $request, Viagem $viagem)
  {

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
      $viagem->transporte = $request->transporte;
      $viagem->hospedagem = $request->hospedagem;
      $viagem->data_inicial = $data_formatada_inicial;
      $viagem->data_final =  $data_formatada_final;
      $viagem->roteiro = $request->roteiro;
      $viagem->limite_pessoas = $request->limite_pessoas;
      $viagem->save();
      alert()->success('Viagem Cadastrada com sucesso');
      return view('/viagem/cadastrarViagem');
    }
  }


}

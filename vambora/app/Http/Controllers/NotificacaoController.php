<?php

namespace App\Http\Controllers;

use App\Notificacao;
use Illuminate\Http\Request;

class NotificacaoController extends Controller
{

  /**
  *==============================================================
  *FUNÇÃO QUE RETORNA AS NOTIFICAÇÕES DE UM USUÁRIO
  *==============================================================
  **/
  public function retornaNotificacoes($id){
    if(session()->has('logado')){
      if(session()->get('logado.id') == $id) {
        $notificacoes = Notificacao::where('idUsuario', $id)->orderBy('created_at', 'DESC')->take(10)->get();

        return response()->json($notificacoes);
      } else {
        return response()->json([
            'error' => true
        ]);
      }
    } else {
      return response()->json([
          'error' => true
      ]);
    }
  }
}

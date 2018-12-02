<?php

namespace App\Observer;

use App\Grupo;
use App\Notificacao;
use App\Participante;

class ParticipanteObserver
{
  public function created(Participante $participante)
  {
    $notificacao = new Notificacao();
    $notificacao->texto = "Seu grupo ".Grupo::where("id", $participante->idGrupo)->first()->nomeGrupo." tem um novo participante!";
    $notificacao->link = "/grupo/".Grupo::where("id", $participante->idGrupo)->first()->id;
    $notificacao->idUsuario = $participante->idUsuario;
    $notificacao->save();
  }
}

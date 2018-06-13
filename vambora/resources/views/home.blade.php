@extends('template.template-home')
<meta name="csrf-token" content="{{ csrf_token() }}">

@section('content')
  <nav>
    <div class="logo">
      <img src="../img/PRETO.png" alt="">
    </div>

    <div class="btn-nav">
      @if(session()->has('logado'))
        <a href="/perfil"><img src="../img/usuario.png" alt="">{!! session()->get('logado.nome') !!}</a>
          <a href="/cadastrarViagem"><img src="../img/mais.png" alt="">Cadastrar Viagem</a>
        <a href="/logout"><img src="../img/sair.png" alt="">Sair</a>
      @else
        <a href="/login"><img src="../img/entrar.png" alt="">Entrar</a>
        <a href="/cadastrarViagem"><img src="../img/mais.png" alt="">Cadastrar Viagem</a>
      @endif

    </div>
  </nav>



  <div class="conteudo">
    <div class="img-conteudo">
      <img src="../img/mapa.png" alt="">
    </div>
    <div class="texto-conteudo">
      <h3>Encontre grupos para viajar do mundo inteiro e
          <br> compartilhe momentos inesquecíveis!
      </h3>
    </div>
  </div>


@include('sweet::alert')
@endsection

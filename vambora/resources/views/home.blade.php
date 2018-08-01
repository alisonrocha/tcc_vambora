@extends('template.template-home')
<meta name="csrf-token" content="{{ csrf_token() }}">

@section('content')
  <nav>
    <div class="logo">
    <a href="/"><img src="../img/PRETO.png" alt=""></a>
    </div>   
    @if(session()->has('logado'))
    <div class="btn-nav-logado">
      <a href="/perfil"><img src="../img/usuario.png" alt="">{!! session()->get('logado.nome') !!}</a>
        <a href="/cadastrarViagem"><img src="../img/mais.png" alt="">Cadastrar Viagem</a>
        <a href="#"><img src="../img/forum.png" alt="">Forum</a>
        <a href="/login"><img src="../img/blog.png" alt="">Blog</a>        
        <a href="#"><img src="../img/notificacao.png" alt="">Notificação</a>
      <a href="/logout"><img src="../img/sair.png" alt="">Sair</a>
    </div>
    @else
    <div class="btn-nav">
      <a href="/login"><img src="../img/entrar.png" alt="">Entrar</a>
      <a href="/cadastrarViagem"><img src="../img/mais.png" alt="">Cadastrar Viagem</a>
      <a href="#"><img src="../img/forum.png" alt="">Forum</a>
      <a href="/login"><img src="../img/blog.png" alt="">Blog</a>
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
      
      <!--Abre Formulário de Pesquisa de viagens-->
      {!! Form::open(['route' => 'viagem.pesquisar', 'method' => 'post', 'class' => 'form-buscar-grupo ']) !!}
        {!! Form::text('pesquisa', null, ['placeholder' => 'Ex. Buenos Aires, Lima, Paris'])!!}
        {!! form::submit('Pesquisar') !!}
      <!--Fecha Formulário-->
      {!! Form::close() !!}

    <!-- <div class="dados-viagem">
      <ul>
        <li><a href="">Grupos Ativos</a><strong>{{ $total }}</strong></li>
        <li><a href="">Grupos Intercâmbios</a><strong>{{ $totalC }}</strong></li>
        <li><a href="">Grupos Nacionais</a><strong>{{ $totalN }}</strong></li>
        <li><a href="">Grupos Internacionais</a><strong>{{ $totalI }}</strong></li>
      </ul>    
    </div>        -->
    </div>
  </div>


@include('sweet::alert')
@endsection




@if(session()->has('logado'))

<nav class="menu-responsivo" id="menu-responsivo">
  <a href="/" class="fechar">X</a>
  <ul>
    <li>{!!session()->get('logado.nome')!!}</li>
    <li><a href="/viagem/cadastrar" >Cadastrar Viagem</a></li>
    <li><a href="/perfil">Perfil</a></li>
    <li><a href=""> Grupos Cadastrados {!! session()->get('qtdGrupo')!!}</a></li>
    <li><a href="">Grupos Participando {!! session()->get('qtdParticipando')!!}</a> </li>
    <li><a href="/blog">Blog</a></li>
    <li>Notificação</li>
    <li><a href="#modal-sair" rel="modal:open">Sair</a></li>
  </ul>
</nav>


<header class="cabecalho container">
  <div class="logo">
    <a href="/"><img src="../img/COLORIDA.png" alt=""></a>
  </div>
  <button class="btn-mobile" onclick="menu()"><img src="../img/menu.png" alt=""></button>

  <nav class="menu">
    <ul class="menu-list">
      <li><a href=""><img src="../img/usuario.png" alt="" onclick="submenu()">{!! session()->get('logado.nome') !!}</a>
        <ul class="sub-menu">
          <li><a href="/perfil">Perfil</a></li>
          <li><a href="#" id="numeroGrupoCadastrados">Grupos Cadastrados {!! session()->get('qtdGrupo')!!} </a></li>
          <li><a href="#" id="numeroGrupoParticipando">Grupos Participando {!! session()->get('qtdParticipando')!!} </a></li>
          <span class="hidden" id="id_usuario" data-id="{!! session()->get('logado.id')!!}"></span>
        </ul>
      </li>
      <li><a href="/viagem/cadastrar"  class="btn-cadastro-viagem"><img src="../img/mais.png" alt="">Cadastrar Viagem</a></li>
      <li><a href="/blog"><img src="../img/blog.png" alt="">Blog</a> </li>
      <li><a href="#"><img src="../img/notificacao.png" alt="">Notificação</a></li>
      <li><a href="#modal-sair" rel="modal:open"><img src="../img/sair.png" alt="">Sair</a></li>
    </ul>
    </div>
  </nav>
</header>
@else
<header class="cabecalho container2">
  <div class="logo2">
    <a href="/"><img src="../img/COLORIDA.png" alt=""></a>
  </div>
</header>
@endif

<!-- MODAL -->
<div id="modal-sair" class="modal">
  <p>Quer sair mesmo?</p>
  <a href="/logout"  class="btn-modal-sim">sim</a>
  <a href="" rel="modal:close"  class="btn-modal-nao">não</a>
</div>

<script>
  function menu(){
    document.getElementById('menu-responsivo').style.display = "block";
  }
</script>

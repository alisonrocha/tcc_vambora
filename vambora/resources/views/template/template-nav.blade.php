@if(session()->has('logado'))   
<header class="cabecalho container">
  <div class="logo">
    <a href="/"><img src="../img/COLORIDA.png" alt=""></a>
  </div> 
  <button class="btn-mobile"><img src="../img/menu.png" alt=""></button>   
  <nav class="menu">    
    <ul class="menu-list">
      <li><a href=""><img src="../img/usuario.png" alt="" onclick="submenu()">{!! session()->get('logado.nome') !!}</a>
        <ul class="sub-menu">
          <li><a href="/perfil">Perfil</a></li>
          <li><a href="#">Grupos Cadastrados</a></li>
          <li><a href="#">Grupos Participando</a></li>            
        </ul>
      </li>
      <li><a href="/viagem/cadastrar"><img src="../img/mais.png" alt="">Cadastrar Viagem</a></li>
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
  <a href="" rel="modal:close">Não</a>
  <a href="/logout">Sim</a>
</div>






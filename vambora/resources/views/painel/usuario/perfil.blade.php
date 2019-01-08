@extends('layouts.template')
@section('content')
  <div class="container-perfil">     
    <div class="info-perfil">
      <div class="titulo">
        <h2>Perfil Usuário</h2>
      </div>
      <div class="img-perfil"><img class="foto-perfil" src="{!! session()->get('logado.imagem') !!}" alt=""></p></div>
      <p><strong>{!! session()->get('logado.nome')  !!}</strong> </p>
      <p>Data Nascimento: {!!  date( 'd/m/Y' , strtotime(session()->get('logado.dataNascimento'))) !!}</p>
      <p>Sexo: {!! session()->get('logado.sexo') !!}</p>
      <p>Facebook: {!! session()->get('logado.facebook') !!}</p>
      <p>Instagram: {!! session()->get('logado.instagram') !!}</p>
      <p>email: {!! session()->get('logado.email') !!}</p>
      <div class="editar"><a href="/editarUsuario/{!! session()->get('logado.id') !!}">Editar Perfil</a></div>      
      <div class="desativar"><a href="#modal-desativar" rel="modal:open">Desativar conta</a></div>   
    </div>   
  </div>
  

<!-- MODAL -->
<div id="modal-desativar" class="modal">
  <p>Deseja desativar sua conta?</p>  
  <a href="/desativar" class="btn-modal-sim">sim</a>
  <a href="" rel="modal:close" class="btn-modal-nao">não</a>
</div>
@include('sweet::alert')
@endsection

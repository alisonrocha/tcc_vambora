@extends('template.template-home')
@extends('template.template-nav')

@section('content')
  <div class="container-perfil">     
    <div class="info-perfil">
      <div class="titulo">
        <h2>Perfil Usuário</h2>
      </div>
      <div class="img-perfil"><img class="foto-perfil" src="{!! session()->get('logado.imagem') !!}" alt=""></p></div>
      <p><strong>{!! session()->get('logado.nome')  !!} {!! session()->get('logado.sobrenome') !!}</strong> </p>
      <p>Data de Nascimento: {!! session()->get('logado.data_nascimento') !!}</p>
      <p>Sexo: {!! session()->get('logado.sexo') !!}</p>
      <p>Facebook: {!! session()->get('logado.facebook') !!}</p>
      <p>Instagram: {!! session()->get('logado.instagram') !!}</p>
      <p>email: {!! session()->get('logado.email') !!}</p>
      <div class="editar"><a href="/editarUsuario/{!! session()->get('logado.id') !!}">Editar Perfil</a></div>      
      <div class="desativar"><a href="">Desativar conta</a></div>   
    </div>   
  </div>
@include('sweet::alert')
@endsection

@extends('template.template-home')
@extends('template.template-nav')

@section('content')
  <div class="container-perfil">
    <div class="titulo">
      <h3>Perfil Usuário</h3>
    </div> 

    <p>Nome: {!! session()->get('logado.nome')  !!} {!! session()->get('logado.sobrenome') !!}</p>
    <p>Data de Nascimento: {!! session()->get('logado.data_nascimento') !!}</p>
    <p>Sexo: {!! session()->get('logado.sexo') !!}</p>
    <p>Facebook: {!! session()->get('logado.facebook') !!}</p>
    <p>Instagram: {!! session()->get('logado.instagram') !!}</p>
    <p>email: {!! session()->get('logado.email') !!}</p>

    <button class="editar"><a href="/editarUsuario">Editar Perfil</a></button>      
    <button class="desativar"><a href="/editarUsuario">Desativar conta</a></button>   
  </div>


@include('sweet::alert')
@endsection

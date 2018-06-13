@extends('template.template-home')
@extends('template.template-nav-centro')

@section('content')
  <div class="container-perfil">
    <h1>Perfil Usuário</h1>
    <p>Nome: {!! session()->get('logado.nome')  !!} {!! session()->get('logado.sobrenome') !!}</p>
    <p>Data de Nascimento: {!! session()->get('logado.data_nascimento') !!}</p>
    <p>Sexo: {!! session()->get('logado.sexo') !!}</p>
    <p>Facebook: {!! session()->get('logado.facebook') !!}</p>
    <p>Instagram: {!! session()->get('logado.instagram') !!}</p>
    <p>email: {!! session()->get('logado.email') !!}</p>

    <a href="/editarUsuario">Editar Perfil</a>
    <a href="/editarUsuario">Desativar conta</a>
  </div>


@include('sweet::alert')
@endsection

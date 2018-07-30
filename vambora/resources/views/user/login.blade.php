@extends('template.template-home')

@section('content')
  <div class="pagina-login">    
    @extends('template.template-nav-centro')
    <section id="conteudo-view" class="login">
      <div class="conteudo-texto">
        <h1>Vambora! viajar?</h1>
        <h3>Entre com seu e-mail e senha.</h3>  
      </div>
      {!! Form::open(['class'=> 'form-login','route' => 'user.login', 'method' => 'post']) !!}
        @csrf
        <label>
          {!! Form::email('email', null, ['class' => 'input', 'placeholder' => 'e-mail'])!!}
        </label>
        <label>
          {!! Form::password('senha', ['placeholder' => 'senha'])!!}
        </label>
          {!! form::submit('Entrar') !!}
      {!! form::close() !!}
      <p>Você ainda não possui uma conta? <a href="/cadastrarUsuario">Cadastrar-se</a></p>
    </section>
  </div>
  @include('sweet::alert')
@endsection

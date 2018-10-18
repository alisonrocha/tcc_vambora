@extends('template.template-home')
@section('content')
  <div class="pagina-login">   
    <section id="conteudo-view" class="login">
      <div class="img-login"><img src="../img/COLORIDA.png" alt=""></div> 
      <div class="conteudo-texto">        
        <strong>Entre com seu e-mail e senha.</strong>  
      </div>
      {!! Form::open(['class'=> 'form-login','route' => 'user.login', 'method' => 'post']) !!}
        @csrf
        <label>
          {!! Form::email('email', null, ['class' => 'input email', 'placeholder' => 'e-mail'])!!}
        </label>
        <label>
          {!! Form::password('senha', ['placeholder' => 'senha'])!!}
        </label>
          {!! form::submit('Entrar') !!}
      {!! form::close() !!}
      <p>Você ainda não possui uma conta? <a href="/cadastrar">Cadastrar-se</a></p>
      <p class="recuperar-senha"><a href="/reset">Esqueceu Senha</a></p>
    </section>
  </div>
  @include('sweet::alert')

<script>

//Quando documento carregar 
$(document).ready(function(){
 
})

</script>


@endsection

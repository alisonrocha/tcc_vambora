
@extends('template.template-home')
@extends('template.template-nav-centro')
@section('content')
    <section id="conteudo-view" class="cadastrar-usuario">
      <div class="img-cadastrar-usuario">
        <img src="../img/img-conteudo.gif" alt="">
      </div>
      <div class="form-cadastro">
          <h1>Cadastra-se e Vambora! viajar.</h1>
        <!--Formulário utilizando a classe laravel *Por Padrão já vem com method POST *Gera um TOKEN-->
          {!! Form::open(['route' => 'user.cadastroUsuario', 'method' => 'post', 'class' => 'form-cadastro-usuario']) !!}
          {!! Form::text('nome', null, ['class' => 'input', 'placeholder' => 'nome'])!!}
          {!! Form::text('sobrenome', null, ['class' => 'input', 'placeholder' => 'sobrenome'])!!}
          {!! Form::select('sexo', ['M' => 'Masculino', 'F' => 'Feminino'], null, ['placeholder' => 'Sexo']) !!}
          {!! Form::date('date', \Carbon\Carbon::now(), ['class' => 'form-control']) !!}
          {!! Form::text('facebook', null,['class' => 'input', 'placeholder' => 'facebook'])!!}
          {!! Form::text('instagram', null, ['class' => 'input', 'placeholder' => 'instagram'])!!}
          {!! Form::email('email', null, ['class' => 'input', 'placeholder' => 'email@email'])!!}
          {!! Form::password('senha', ['placeholder' => 'senha'])!!}
          {!! form::submit('Entrar') !!}
        <!--Fecha Formulário-->
        {!! form::close() !!}
      </div>
    </section>
    <script src="https://unpkg.com/sweetalert2@7.18.0/dist/sweetalert2.all.js"></script>
    @include('sweet::alert')
@section('content')

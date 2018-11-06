
@extends('template.template-home')

@section('content')
<header class="cabecalho container2">
  <div class="logo2">
    <a href="/"><img src="../img/COLORIDA.png" alt=""></a>
  </div>  
</header>
<div class="page-cadastrar-usuario">
  <section id="conteudo-view" class="cadastrar-usuario">      
    <div class="conteudo-texto">
      <h2>Cadastra-se e Vambora! viajar.</h2>
    </div>
    <div class="form-cadastro">          
      <!--Formulário utilizando a classe laravel *Por Padrão já vem com method POST *Gera um TOKEN-->
        {!! Form::open(['route' => 'usuario.cadastro', 'method' => 'post', 'class' => 'form-cadastro-usuario', 'enctype' => 'multipart/form-data']) !!}          
          {!! Form::text('nome', null, ['class' => 'input nome', 'placeholder' => 'nome'])!!}
          {!! Form::text('sobrenome', null, ['class' => 'input', 'placeholder' => 'sobrenome'])!!}
          {!! Form::select('sexo', ['M' => 'Masculino', 'F' => 'Feminino'], null, ['placeholder' => 'Sexo']) !!}
          <p>Data Nascimento</p>
          {!! Form::date('date', \Carbon\Carbon::now(), ['class' => 'form-control']) !!}
          {!! Form::text('facebook', null,['class' => 'input', 'placeholder' => 'facebook'])!!}
          {!! Form::text('instagram', null, ['class' => 'input', 'placeholder' => 'instagram'])!!}
          {!!  Form::file('imagem')!!}
          {!! Form::email('email', null, ['class' => 'input', 'placeholder' => 'email@email'])!!}
          {!! Form::password('senha', ['placeholder' => 'senha'])!!}
          {!! Form::password('senha', ['placeholder' => 'senha'])!!}
          {!! form::submit('Cadastrar') !!}   
          <a href="/">Voltar</a>        
      <!--Fecha Formulário-->
      {!! form::close() !!}
    </div>
  </section>
</div>

<script src="https://unpkg.com/sweetalert2@7.18.0/dist/sweetalert2.all.js"></script>
@include('sweet::alert')
@section('scripts')    
  <script>
    $(document).ready(function(){
      var options = {
        translation : {
            'A': {pattern: /[A-Z]/},
            'a': {pattern: /[a-zA-Z]/},
            'S': {pattern: /[a-zA-Z0-9]/},
            'L': {pattern: /[a-z]/},
        }
      }      
      $('.nome').mask('', options);
    });
  </script>
@endsection

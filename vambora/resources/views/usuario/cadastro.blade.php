
@extends('template.template-home')

@section('content')

<section id="conteudo-view" class="cadastrar-usuario">      
  <div class="conteudo-texto">
    <h1>Cadastra-se e Vambora! viajar.</h1>
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
    <!--Fecha Formulário-->
    {!! form::close() !!}
  </div>
</section>
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

@extends('template.template-home')
@extends('template.template-nav')

@section('content')
<div class="page-cadastrar-usuario">
  <section id="conteudo-view" class="cadastrar-usuario">      
    <div class="conteudo-texto">
      <h2>{{$title ?? 'Cadastra-se e Vambora! viajar.'}} </h2>
    </div>
    <div class="form-cadastro"> 
    @if(isset($result))
      {!! Form::open(['route' => 'usuario.editar', 'method' => 'post', 'class' => 'form-cadastro-usuario', 'enctype' => 'multipart/form-data']) !!}   
    @else
      {!! Form::open(['route' => 'usuario.cadastro', 'method' => 'post', 'class' => 'form-cadastro-usuario', 'enctype' => 'multipart/form-data']) !!}   
    @endif
      <!--Formulário utilizando a classe laravel *Por Padrão já vem com method POST *Gera um TOKEN-->              
      {!! Form::text('nome', $result->nome ?? null, ['class' => 'input nome', 'placeholder' => $result->nome ??  'nome'])!!}
      {!! Form::text('sobrenome', $result->sobrenome ?? null, ['class' => 'input', 'placeholder' => $result->sobrenome ??  'sobrenome'])!!}
      {!! Form::select('sexo', ['M' => 'Masculino', 'F' => 'Feminino'], $result->sexo ?? null, ['placeholder' => $result->sexo ??  'sexo']) !!}
      <p>Data Nascimento</p>
      {!! Form::date('date', \Carbon\Carbon::now(), ['class' => 'form-control', 'placeholder' => 'data']) !!}
      {!! Form::text('facebook', $result->facebook ?? null,['class' => 'input', 'placeholder' => $result->facebook ??  'facebook'])!!}
      {!! Form::text('instagram', $result->instagram ?? null, ['class' => 'input', 'placeholder' => $result->instagram ??  'instagram'])!!}
      <p>Foto para Perfil </p>    
      {!!  Form::file('imagem')!!}                   
      {!! Form::email('email', $result->email ?? null, ['class' => 'input', 'placeholder' => $result->email ??  'email@email'])!!}
      @if(isset($result))
      {!! form::submit('Editar') !!}            
      @else
      {!! Form::password('senha', ['placeholder' => 'senha'])!!}
      {!! Form::password('senha', ['placeholder' => 'confirmar senha'])!!}
      {!! form::submit('Cadastrar') !!}            
      @endif           
      <a href="/">Voltar</a>        
      <!--Fecha Formulário-->
      {!! form::close() !!}   
    </div>
  </section> 
</div>


<script src="https://unpkg.com/sweetalert2@7.18.0/dist/sweetalert2.all.js"></script>
@include('sweet::alert')

@stop

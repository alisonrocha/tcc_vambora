@extends('template.template-home')
<meta name="csrf-token" content="{{ csrf_token() }}">

@extends('template.template-nav')
@section('content')
  <div class="page-home">

    <section id="conteudo-view" class="conteudo">   
      <div class="img-conteudo">
        <img src="../img/mapa.png" alt="">
      </div>
      <div class="texto-conteudo">
        <h3>Encontre grupos para viajar do mundo inteiro e
            <br> compartilhe momentos inesquecíveis!
        </h3>        
        <!--Abre Formulário de Pesquisa de viagens-->
        {!! Form::open(['route' => 'viagem.pesquisar', 'method' => 'post', 'class' => 'form-buscar-grupo ']) !!}
          {!! Form::text('pesquisa', null, ['placeholder' => 'Ex. Buenos Aires, Lima, Paris'])!!}
          {!! form::submit('Pesquisar') !!}      
        
        <!--Fecha Formulário-->
        {!! Form::close() !!}      
      </div>
    </section>
  </div>

@include('sweet::alert')
@endsection

<script>
 function submenu(){
   alert('OI');
 }

</script>


@extends('template.template-home')
<meta name="csrf-token" content="{{ csrf_token() }}">

@section('content')

  <div class="conteudo">
  @extends('template.template-nav')
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

    <!-- <div class="dados-viagem">
      <ul>
        <li><a href="">Grupos Ativos</a><strong>{{ $total }}</strong></li>
        <li><a href="">Grupos Intercâmbios</a><strong>{{ $totalC }}</strong></li>
        <li><a href="">Grupos Nacionais</a><strong>{{ $totalN }}</strong></li>
        <li><a href="">Grupos Internacionais</a><strong>{{ $totalI }}</strong></li>
      </ul>    
    </div>        -->
    </div>
  </div>

@include('sweet::alert')
@endsection

<script>
 function submenu(){
   alert('OI');
 }

</script>


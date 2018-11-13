@extends('template.template-home')
<meta name="csrf-token" content="{{ csrf_token() }}">

@section('content')
@extends('template.template-nav')

<div class="form-pesquisar">
  <!--Abre Formulário de Pesquisa de viagens-->
  {!! Form::open(['route' => 'viagem.pesquisar', 'method' => 'post', 'class' => 'form-pesquisar-grupo ']) !!}
    {!! Form::text('pesquisa', null, ['placeholder' => 'Ex. Buenos Aires, Lima, Paris'])!!}    
    {!! form::submit('Pesquisar') !!}
  <!--Fecha Formulário-->
  {!! Form::close() !!}
</div>

@if (count($resultado) === 0)
  <div class="text-cont">
    <h3>Não foi encontrado nenhum grupo, faça uma nova pesquisa!</h3>
  </div>
@endif 

@foreach ($resultado as $grupo)
<div class="pesquisa-grupo">
  <div class="card-grupo"> 
    <div class="nome-grupo"> 
      <div class="txt">
        <img src="../img/maps.png" alt="">
        <span>{{$grupo->destino}}</span>
      </div> 
      <div class="calendario">
        <img src="../img/calendario.png" alt="">
        <strong>{{ date( 'd/m/Y' , strtotime($grupo->dataInicial))}} a {{ date( 'd/m/Y' , strtotime($grupo->dataFinal))}}</strong>
      </div>          
    </div>

    <div class="dados-grupo">
      <div class="foto-perfil"></div>
      <p><img src="/public/img/localizacao.png" alt=""></p>
      <p><strong>Roteiro:</strong> {{$grupo->roteiro}}</p>      
      <div class="dados">
        <ul>
          <li><img src="../img/pessoas.png" alt="">5 participantes</li>
          <li><img src="../img/tipo.png" alt="">{{$grupo->tipo}}</li>
          <li><img src="../img/acomodar.png" alt="">{{$grupo->hospedagem}}</li>
        </ul>
      </div>
      
      @if(null)
          <div class="btn-participar"><a href="{{url('/grupo/'.$grupo->idViagem)}}">Entrar</a></div>         
        @else
          <div class="btn-participar"><a href="{{url('/participar/'.$grupo->id)}}">Participar</a></div>
        @endif     
    </div>     
  </div> 
</div>
@endforeach 
<script>
  document.body.className = 'page-loaded';
</script> 

@include('sweet::alert')
@endsection

@extends('layouts.template')
<meta name="csrf-token" content="{{ csrf_token() }}">

@section('content')

<div class="grupos-participando">
@foreach ($resultado as $grupo)
<div class="pesquisa-grupo">
  <div class="card-grupo"> 
    <div class="nome-grupo"> 
      <div class="txt">
        <img src="../img/maps.png" alt="">
        <span>{{$grupo->viagem->destino}}</span>
      </div> 
      <div class="calendario">
        <img src="../img/calendario.png" alt="">
        <span>{{ date( 'd/m/Y' , strtotime($grupo->viagem->dataInicial))}} a {{ date( 'd/m/Y' , strtotime($grupo->viagem->dataFinal))}}</span> <span class="faltamDias" data-inicial="{{date( 'Y/m/d' , strtotime($grupo->dataInicial))}}"></span>
      </div>          
    </div>

    <div class="dados-grupo">
      <div class="foto-perfil"></div>      
      <p><strong>Roteiro:</strong> {{$grupo->viagem->roteiro}}</p>      
      <div class="dados">
        <ul>
          <li><img src="../img/pessoas.png" alt="">{{$grupo->viagem->count()}} participantes</li>
          <li><img src="../img/tipo.png" alt="">{{$grupo->viagem->tipo}}</li>
          <li><img src="../img/acomodar.png" alt="">{{$grupo->viagem->hospedagem}}</li>
        </ul>
      </div>       
   
        <div class="btn-participar meu-grupo"><a href="{{url('/grupo/'.$grupo->id)}}">Entrar</a></div>
    </div>     
  </div> 
</div>
@endforeach  

</div>


<script>
  document.body.className = 'page-loaded';
</script> 

@include('sweet::alert')
@endsection

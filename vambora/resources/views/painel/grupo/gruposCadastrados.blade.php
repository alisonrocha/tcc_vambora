@extends('layouts.template')
<meta name="csrf-token" content="{{ csrf_token() }}">

@section('content')
<div class="grupos-cadastrados">
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
          <span>{{ date( 'd/m/Y' , strtotime($grupo->dataInicial))}} a {{ date( 'd/m/Y' , strtotime($grupo->dataFinal))}}</span> <span class="faltamDias" data-inicial="{{date( 'Y/m/d' , strtotime($grupo->dataInicial))}}"></span>
        </div>          
      </div>

      <div class="dados-grupo">
        <div class="foto-perfil"></div>      
        <p><strong>Roteiro:</strong> {{$grupo->roteiro}}</p>      
        <div class="dados">
          <ul>
            <li><img src="../img/pessoas.png" alt="">{{$grupo->participantes->count() + 1}} participantes</li>
            <li><img src="../img/tipo.png" alt="">{{$grupo->tipo}}</li>
            <li><img src="../img/acomodar.png" alt="">{{$grupo->hospedagem}}</li>
          </ul>
        </div>       
    
          <div class="btn-participar meu-grupo"><a href="{{url('/grupo/'.$grupo->id)}}">Entrar</a></div>
      </div>     
    </div> 
  </div>
  @endforeach  
</div>


  <!-- MODAL fORMULÁRIO -->
  <div id="modal-questionario" class="modal">
    <p>Quer sair mesmo?</p>
    <a href="/questionario"  class="btn-modal-sim">Enviar</a>
    <a href="" rel="modal:close"  class="btn-modal-nao">Cancelar</a>
  </div>


<script>
  document.body.className = 'page-loaded';
</script> 

@include('sweet::alert')
@endsection

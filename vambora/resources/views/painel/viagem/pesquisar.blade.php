@extends('layouts.template')
<meta name="csrf-token" content="{{ csrf_token() }}">

@section('content')

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
        <span>{{ date( 'd/m/Y' , strtotime($grupo->dataInicial))}} a {{ date( 'd/m/Y' , strtotime($grupo->dataFinal))}}</span> <span class="faltamDias" data-inicial="{{date( 'Y/m/d' , strtotime($grupo->dataInicial))}}"></span>
      </div>          
    </div>

    <div class="dados-grupo">
      <div class="foto-perfil"></div>      
      <p><strong>Descrição:</strong> {{$grupo->roteiro}}</p>      
      <div class="dados">
        <ul>
          <li><img src="../img/pessoas.png" alt="">{{$grupo->participantes->count() + 1}} participante(s)</li>
          <li><img src="../img/tipo.png" alt="">{{$grupo->tipo}}</li>
          <li><img src="../img/acomodar.png" alt="">{{$grupo->hospedagem}}</li>
        </ul>
      </div>  
      
       
      @if($grupo->idUsuario === session()->get('logado.id'))
          <div class="btn-participar meu-grupo"><a href="{{url('/grupo/'.$grupo->id)}}">Seu Grupo | Entrar</a></div>
      @break
      @elseif($grupo->participantes->count() === 0)
          <div class="btn-participar"><a href="{{url('/participar/'.$grupo->id)}}">Participar</a></div> 
      @endif
     
        @foreach($grupo->participantes as $participa)                          
            @if($participa->idUsuario === session()->get('logado.id'))
              <div class="btn-participar meu-grupo"><a href="{{url('/grupo/'.$grupo->id)}}">Já Participa | Entrar</a></div>  
            @break         
            @elseif($participa->idAdministrador === session()->get('logado.id'))
            @else
            <div class="btn-participar"><a href="{{url('/participar/'.$grupo->id)}}">Participar</a></div>
            @endif  
         
        @endforeach 
        
           
    </div>     
  </div> 
</div>

@endforeach  


  
<script>
  document.body.className = 'page-loaded';
</script> 

@include('sweet::alert')
@endsection

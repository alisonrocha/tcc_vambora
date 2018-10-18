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
    <h3>Não foi encontrado nenhum grupo, faça uma nova pesquisa!</h3>
@endif 

@foreach ($resultado as $grupo)
<div class="pesquisa-grupo">
  <div class="card-grupo"> 
    <div class="nome-grupo">
      <span>{{$grupo->nomeGrupo}}</span>
        @if(null)
          <div class="data"><img src="../img/like.png" alt=""></div>       
        @else
          <div></div>
        @endif
           
    </div>

    <div class="dados-grupo">
      <div class="foto-perfil"><p>Usuario</p> </div>
      <p><img src="/public/img/localizacao.png" alt=""></p>
      <p>descrição</p>      
        @if(null)
          <div class="btn-participar"><a href="{{url('/grupo/'.$grupo->idViagem)}}">Entrar</a></div>         
        @else
          <div class="btn-participar"><a href="{{url('/participar/'.$grupo->idViagem)}}">Participar</a></div>
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

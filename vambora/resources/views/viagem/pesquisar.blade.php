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
        <span>{{$grupo->nomeGrupo}}</span>
      </div> 
      <div class="calendario">
        <img src="../img/calendario.png" alt="">
        <strong>10/10/0000 a 10/10/0000</strong>
      </div>          
    </div>

    <div class="dados-grupo">
      <div class="foto-perfil"></div>
      <p><img src="/public/img/localizacao.png" alt=""></p>
      <p><strong>Descrição:</strong> Lorem ipsum luctus magna vestibulum integer hendrerit vulputate nec cursus, justo porta scelerisque malesuada ultricies sodales elementum habitasse est habitasse, netus fusce conubia ut sagittis fusce interdum feugiat. aenean hac dictum id sagittis fames quisque faucibus enim pharetra odio praesent, elementum mi morbi mi eros mattis nullam purus aliquet. leo aliquet ut leo sapien sit hac orci justo imperdiet, dapibus purus ad tristique tortor lacinia libero placerat, ultricies quam pretium.</p>      
      <div class="dados">
        <ul>
          <li><img src="../img/pessoas.png" alt="">5 participantes</li>
          <li><img src="../img/tipo.png" alt="">nacional</li>
          <li><img src="../img/acomodar.png" alt="">hostel</li>
        </ul>
      </div>
      
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

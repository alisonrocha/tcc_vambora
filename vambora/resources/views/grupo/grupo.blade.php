@extends('template.template-home')
<meta name="csrf-token" content="{{ csrf_token() }}">

@section('content')
@extends('template.template-nav')

@if(count($query) === 0)
<div class="txt-nao-msg">    
    <h3>Ainda o grupo não tem Mensagem, seja o primeiro a mandar</h3>
</div>    
@endif 

<div class="container-grupo">  
    <div class="card-inc">
        <h2>Grupo Argentina</h2>
        <strong>Data Viagem 05/02/2018 a 10/03/2018</strong>
    </div>
    <div class="card-msg">       
        <div class="mensagem">
            <div class="img">
                <img src="../img/re.jpg" alt="">
            </div>
            <div class="corp-msg">
                <div class="dados-msgm">
                    <strong>Renata Alves</strong>
                    <p>2 seconds ago</p>
                </div>
                <p>is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electroni</p>
            </div>                          
        </div>
        <hr> 
    <div>
    {!! Form::open(['route' => 'grupo.grupo', 'method' => 'post', 'class' => 'form-buscar-grupo form-grupo']) !!}
        {{ Form::hidden('idUsuario', session()->get('logado.id')) }}
        {{ Form::hidden('idGrupo', $idGrupo) }}    
        {!! Form::text('mensagem', null, ['placeholder' => 'Escrever Mensagem para o grupo'])!!}  
        {!! form::submit('Enviar') !!}  
   {!! Form::close() !!}
</div>     


@include('sweet::alert')
@endsection

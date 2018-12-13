@extends('layouts.template')
<meta name="csrf-token" content="{{ csrf_token() }}">

@section('content')

<div class="conteudo-perfil">   
    <div class="card-perfil">
        <h3>Perfil Participante {{$user->nome}} {{$user->sobrenome}}</h3>
        <div class="dados-perfil">
            <img src="" alt="">
            <p><span>Idade: </span>{{  date('Y') - date( 'Y' , strtotime($user->dataNascimento)) }} Anos</p>
            <p><span>Sexo: </span>{{$user->sexo}}</p>
            <p><span>Facebook: </span>{{$user->facebook}}</p>
            <p><span>Instagran: </span>{{$user->instagram}}</p>
            <hr>
            <a href="{{ URL::previous() }}" class="voltar">Voltar para Grupo</a>
        </div>        
    </div>   
</div>



@include('sweet::alert')
@endsection

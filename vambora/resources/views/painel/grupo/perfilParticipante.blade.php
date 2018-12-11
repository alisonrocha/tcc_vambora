@extends('layouts.template')
<meta name="csrf-token" content="{{ csrf_token() }}">

@section('content')

<div class="conteudo-perfil">
    @foreach($participante as $participante)
    @foreach($participante->user as $dados)
    <div class="card-perfil">
        <h3>Perfil Participante {{$dados->nome}} {{$dados->sobrenome}}</h3>
        <div class="dados-perfil">
            <img src="" alt="">
            <p><span>Idade: </span>{{ date( 'Y' , strtotime($dados->dataNascimento)) - date('Y')}} Anos</p>
            <p><span>Sexo: </span>{{$dados->sexo}}</p>
            <p><span>Facebook: </span>{{$dados->facebook}}</p>
            <p><span>Instagran: </span>{{$dados->instagram}}</p>

            <hr>

            <p><span>Grupos Cadastrados: </span>{{$dados->Facebook}}</p>
            <p><span>Grupos Particpantes: </span>{{$dados->Facebook}}</p>
            <a href="{{ URL::previous() }}" class="voltar">Voltar para Grupo</a>
        </div>        
    </div>
    @endforeach
    @endforeach
</div>



@include('sweet::alert')
@endsection

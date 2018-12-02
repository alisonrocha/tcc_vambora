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
@foreach($queryGrupo as $dados)
    <div class="card-inc">
        <h2>{!! $dados->destino!!}</h2>
        <strong><span data-id="{!! $dados->id!!}" class="dataInicial">{{ date( 'd/m/Y' , strtotime($dados->dataInicial))}}</span> a {{ date( 'd/m/Y' , strtotime($dados->dataFinal))}}<span class="faltamDias" data-id="{!! $dados->id!!}"></span></strong>
    </div>
@endforeach

<div class="contagem">
    <div class="dia">10 <br> <span>Dias</span></div> :
    <div class="dia">12 <br> <span>Horas</span></div> :
    <div class="dia">57 <br> <span>Minutes</span></div> :
    <div class="dia">23 <br> <span>Segundos</span></div>




</div>

@if (count($query) === 0)
    <div class="text-cont">
        <h3>Grupo Ainda não tem Mensagens, <br> Seja o primeiro a enviar para galera!</h3>
    </div>
@endif

@foreach($query as $mensagem)
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
                <p>{!! $mensagem->mensagem!!}</p>
            </div>
        </div>

        <hr>
        <div class="comentario">
            <div class="img-comentario">
                <a href="#modal-comentario" rel="modal:open"><img src="../img/comentario.png" alt=""><span>Comentar</span></a>
            </div>

        </div>
    <div>
@endforeach

    {!! Form::open(['route' => 'grupo.grupo', 'method' => 'post', 'class' => 'form-buscar-grupo form-grupo']) !!}
        {{ Form::hidden('idUsuario', session()->get('logado.id')) }}
        {{ Form::hidden('idGrupo', $idGrupo) }}
        {!! Form::text('mensagem', null, ['placeholder' => 'Escrever Mensagem para o grupo'])!!}
        {!! form::submit('Enviar') !!}
   {!! Form::close() !!}
</div>

<!-- MODAL -->
<div id="modal-comentario" class="modal recuperar">
    <p>Escrever Comentário</p>
    {!! Form::open(['class'=> 'form-recuperar-senha','route' => 'user.recuperar', 'method' => 'post']) !!}
    {!! Form::text('comentario', null, ['class' => 'input email', 'placeholder' => 'Escrever comentário'])!!}
    {!! Form::file('imagem') !!}
    {!! form::submit('Enviar') !!}
    {!! form::close() !!}
</div>


@include('sweet::alert')
@endsection

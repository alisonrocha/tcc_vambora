@extends('layouts.template')
<meta name="csrf-token" content="{{ csrf_token() }}">
@section('content')
<div class="container-grupo">
    <div class="servicos">
        <div class="acomodacao zero">
            <img src="../img/pessoas.png" alt="" class="img-left">
            <span>Participantes do Grupo</span>
            <img src="../img/seta-baixo.png" alt="" class="img-right">
        </div>
        
        <div class="acomodacao um"><img src="../img/acomodar.png" alt="" class="img-left"><span>Dicas de Acomodações</span><img src="../img/seta-baixo.png" alt="" class="img-right"></div>
        <div class="acomodacao dois"><img src="../img/restaurante.png" alt="" class="img-left"><span>Dicas de Restaurantes</span><img src="../img/seta-baixo.png" alt="" class="img-right"></div>
        <div class="acomodacao tres"><img src="../img/tour.png" alt="" class="img-left"><span>Dicas de Passeios</span><img src="../img/seta-baixo.png" alt="" class="img-right"></div>
        <div class="acomodacao quatro"><img src="../img/passagem.png" alt="" class="img-left"><span>Dicas de Passagens</span><img src="../img/seta-baixo.png" alt="" class="img-right"></div>
    </div>  
    <div class="cont">
    <div class="card-inc"> 
        @foreach($queryGrupo as $dados) 
            <h2>{!! $dados->destino!!}</h2>
            <span>{{ $dataInicial = date( 'd/m/Y' , strtotime($dados->dataInicial))}} a {{ $dataFinal = date( 'd/m/Y' , strtotime($dados->dataFinal)) }}</span>
            @if($dados->idUsuario === session()->get('logado.id'))
            <div class="editar">Para editar seu grupo <a href="/editarViagem/{!! $dados->id !!}">Clique aqui.</a></div>
            @else
            <div class="editar">Para sair do grupo <a href="#modal-sair-grupo" rel="modal:open">Clique aqui.</a></div>
            @endif
        @endforeach        
    </div>   

    <div class="contagem">
        <span class="faltamDias" data-inicial="{{date( 'Y/m/d' , strtotime($dados->dataInicial))}}"></span>
    </div>
    @if(count($query) === 0)
    <div class="txt-nao-msg">    
        <h3>Ainda o grupo não tem Mensagem, seja o primeiro a mandar ;)</h3>
    </div>    
    @else
    @foreach($query as $mensagem)   
        <div class="card-msg"> 
            <div class="card">
            @if($mensagem->idUsuario === session()->get('logado.id'))
            <div class="excluir"><a href="" alt="excluir"><img src="../img/excluir.png" alt=""></a></div> 
            @endif
            <div class="mensagem">
                <div class="img">
                    <img src="{{$mensagem->user->imagem}}" alt="">
                </div>
                <div class="corp-msg">
                    <div class="dados-msgm">
                        <strong>{{$mensagem->user->nome}} {{$mensagem->user->sobrenome}} </strong>
                        <p>{{ date( 'd/m/Y' , strtotime($mensagem->created_at))}}</p>
                    </div>                    
                    <p>{!! $mensagem->mensagem!!}</p>
                </div>                          
            </div>             
            <p class="titulo">Comentário(s) {{$mensagem->comentario->count()}}</p>
            @foreach($mensagem->comentario as $comentario)             
            <div class="msg-comentario">              
                <div class="dados-msgm">
                    <strong>{{$comentario->nome}} {{$comentario->sobrenome}} </strong>
                    <span>{{ date( 'd/m/Y' , strtotime($comentario->created_at))}}</span>
                </div>
                <p>{!! $comentario->comentario!!}</p>   
                         
            </div>
            @endforeach                        
            <div class="comentario" >                            
                <div class="form-comentario" id="box-toggle" >                    
                    <img src="../img/comentario.png" alt=""><span>Escrever Comentario</span>
                    <div class="tgl" style="display:none;">
                        {!! Form::open(['class'=> 'form-recuperar-senha','route' => 'grupo.comentario', 'method' => 'post']) !!}
                        {{ Form::hidden('idUsuario', session()->get('logado.id')) }}
                        {{ Form::hidden('idGrupo', $idGrupo) }}   
                        {{ Form::hidden('idMensagem', $mensagem->id) }}   
                        {!! Form::text('comentario', null, ['class' => 'input email', 'placeholder' => 'Escrever comentário'])!!}
                        {!! form::submit('Enviar') !!}
                        {!! form::close() !!}  
                    </div>                    
                </div>                    
            </div>
            </div>    
     
        <div>
    @endforeach
    @endif
    {!! Form::open(['route' => 'grupo.grupo', 'method' => 'post', 'class' => 'form-buscar-grupo form-grupo']) !!}
        {{ Form::hidden('idUsuario', session()->get('logado.id')) }}
        {{ Form::hidden('idGrupo', $idGrupo) }}    
        {!! Form::text('mensagem', null, ['placeholder' => 'Escrever Mensagem para o grupo'])!!}  
        {!! form::submit('Enviar') !!}  
    {!! Form::close() !!}
    </div>    
</div>   

<!-- MODAL Sair -->
<div id="modal-sair-grupo" class="modal">
<p>Quer sair do Grupo?</p>
<a href="/sairGrupo"  class="btn-modal-sim">sim</a>
<a href="" rel="modal:close"  class="btn-modal-nao">não</a>
</div>


@include('sweet::alert')
@endsection

@extends('layouts.template')
@section('content') 
<section class="blog">
    <div class="add-experiencia">
        <h2>Compartilhe suas melhores experiências</h2>         
    </div>
    <div class="btn-historia">
        <a href="#modal-blog" rel="modal:open" data-target="#create-item"><p>Escrever história</p></a>
    </div>
    @foreach ($resultado as $user)
        @foreach($user->blog as $dados)
    <div class="cont-blog">
        <div class="img-blog"> 
            <div class="esq">
                <img src="{{$user->imagem}}" alt="">
            </div>
            <div class="dir">
                <span> {{$dados->titulo}}</span>              
                <p>Por: {{$user->nome}} em {{ date( 'd/m/Y' , strtotime($dados->created_at))}}</p>               
            </div>           
        </div>
        <hr>
        <div class="txt-blog">
            <p>{{$dados->texto}}</p>                     
        </div>
    </div>
    @endforeach
    @endforeach 

<!-- MODAL -->
<div id="modal-blog" class="modal">
  <p>Escreva sua experiências</p>
   <!--Abre Formulário de Pesquisa de viagens-->
    {!! Form::open(['route' => 'historia.cadastro', 'method' => 'post', 'class' => 'form-cadastro-historia ']) !!}
    {{ Form::hidden('idUsuario', session()->get('logado.id')) }} 
    {!! Form::text('titulo', null, ['required' => 'required','placeholder' => 'Titulo da História'])!!}       
    {!! Form::textarea('texto', null, ['required' => 'required','placeholder' => 'Texto','rows' => 7, 'cols' => 80])!!}
    {!! form::submit('Cadastrar História') !!}          
  
  <a href="#" rel="modal:close"></a>
</div>


</section>


@include('sweet::alert')
@endsection
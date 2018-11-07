@extends('template.template-home')

@extends('template.template-nav')
@section('content')
 
<section class="blog">
    <div class="add-experiencia">
        <h2>Compartilhe suas melhores experiências</h2>         
    </div>
    <div class="btn-historia">
        <a href="#modal-blog" rel="modal:open"><p>Escrever história</p></a>
    </div>
    @foreach ($resultado as $blog)
    <div class="cont-blog">
        <div class="img-blog"> 
            <div class="esq">
                <img src="../img/re.jpg" alt="">
            </div>
            <div class="dir">
                <span>{{$blog->titulo}}</span>
                <p>Por: Alison Rocha</p>
                <p class="data"> data: 00/00/0000</p>
            </div>           
        </div>
        <div class="txt-blog">
            <p>{{$blog->titulo}}</p>
            <p>Fotos: <a href="">Link</a></p>            
        </div>
    </div>
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
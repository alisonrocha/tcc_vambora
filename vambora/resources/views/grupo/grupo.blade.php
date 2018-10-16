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
<div class="grupo">
<img src="../img/grupo.png" alt=""> <span>Participantes</span>    

</div>


<div class="mensagem">
    

    <img src="../img/papo.png" alt=""> <span>Mensagens</span> 
    


    @foreach ($query as $mensagem)
    <table>
    <tr>
        <th>
            <div class="usuario-dados"><b>Nome</b> horário</div>
          
            <p>{{ $mensagem->mensagem }}</p>
            <hr>
        </th>    
    </tr> 
    </table>
    @endforeach 
    
</div>

</div>

<!--Abre Formulário de Pesquisa de viagens-->

{!! Form::open(['route' => 'grupo.grupo', 'method' => 'post', 'class' => 'form-buscar-grupo form-grupo']) !!}
    {{ Form::hidden('idUsuario', session()->get('logado.id')) }}
    {{ Form::hidden('idGrupo', $idGrupo) }}    
    {!! Form::text('mensagem', null, ['placeholder' => 'Escrever Mensagem para o grupo'])!!}  
    {!! form::submit('Enviar') !!}  
{!! Form::close() !!}








@include('sweet::alert')
@endsection

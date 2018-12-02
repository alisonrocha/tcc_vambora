@extends('layouts.template')
<meta name="csrf-token" content="{{ csrf_token() }}">
@section('content')
  <div class="page-cadastrar">    
   <section id="conteudo-view" class="cadastrar-viagem">    
      <div class="nav-form">       
        <h2>Cadastrar Viagem</h2>
      </div>
      
      <!--Formulário utilizando a classe laravel *Por Padrão já vem com method POST *Gera um TOKEN-->
        {!! Form::open(['route' => 'viagem.cadastrarViagem', 'method' => 'post', 'class' => 'form-cadastro-viagem']) !!}
        {{ Form::hidden('idUsuario', session()->get('logado.id')) }}
        {!! Form::text('destino', null, ['class' => 'input', 'placeholder' => 'destino', 'required' => 'required'])!!}
        {!! Form::select('tipo', ['nacional' => 'Nacional', 'internacional' => 'Internacional', 'intercambio' => 'Intercâmbio'], null, ['placeholder' => 'Tipo de Viagem', 'required' => 'required']) !!}
        {!! Form::select('transporte', ['onibus' => 'Onibus', 'carro' => 'Carro', 'aviao' => 'Avião'], null, ['placeholder' => 'Transporte', 'required' => 'required']) !!}
        {!! Form::select('hospedagem', ['hostel' => 'Hostel', 'hotel' => 'Hotel', 'casa' => 'Casa'], null, ['placeholder' => 'Hospedagem' , 'required' => 'required']) !!}        
        <p>Data Viagem</p>      
        {!! Form::date('data_inicial', \Carbon\Carbon::now(), ['class' => 'form-data', 'placeholder' => 'Data Inical da Viagem', 'required' => 'required']) !!}
        {!! Form::date('data_final', \Carbon\Carbon::now(), ['class' => 'form-data', 'placeholder' => 'Data Inical da Viagem' ]) !!}
        {!! Form::text('roteiro', null,['class' => 'input', 'placeholder' => 'roteiro'])!!}
        {!! Form::submit('Cadastrar') !!}
      <!--Fecha Formulário-->
      {!! Form::close() !!}
</section>
</div>


@include('sweet::alert')
@endsection




@extends('template.template-home')
@extends('template.template-nav-centro')
@section('content')
    <section id="conteudo-view" class="cadastrar-viagem">

      <div class="nav-form">       
        <h1>Cadastrar Viagem</h1>
      </div>

      <!--Formulário utilizando a classe laravel *Por Padrão já vem com method POST *Gera um TOKEN-->
      {!! Form::open(['route' => 'viagem.cadastrarViagem', 'method' => 'post', 'class' => 'form-cadastro-viagem']) !!}
        {{ Form::hidden('idUsuario', session()->get('logado.id')) }}
        {!! Form::text('destino', null, ['class' => 'input', 'placeholder' => 'destino'])!!}
        {!! Form::select('tipo', ['nacional' => 'Nacional', 'internacional' => 'Internacional', 'intercambio' => 'Intercâmbio'], null, ['placeholder' => 'Tipo de Viagem']) !!}
        {!! Form::select('transporte', ['onibus' => 'Onibus', 'carro' => 'Carro', 'aviao' => 'Avião'], null, ['placeholder' => 'Transporte']) !!}
        {!! Form::select('hospedagem', ['hostel' => 'Hostel', 'hotel' => 'Hotel', 'casa' => 'Casa'], null, ['placeholder' => 'Hospedagem']) !!}
        <p>Data Inicial da Viagem</p>
        {!! Form::date('data_inicial', \Carbon\Carbon::now(), ['class' => 'form-control', 'placeholder' => 'Data Inical da Viagem']) !!}
        <p>Data Final da Viagem</p>
        {!! Form::date('data_final', \Carbon\Carbon::now(), ['class' => 'form-control', 'placeholder' => 'Data Inical da Viagem']) !!}
        {!! Form::text('roteiro', null,['class' => 'input', 'placeholder' => 'roteiro'])!!}

        {!! form::submit('Cadastrar') !!}
      <!--Fecha Formulário-->
      {!! form::close() !!}
    </section>

    <script src="https://unpkg.com/sweetalert2@7.18.0/dist/sweetalert2.all.js"></script>
    @include('sweet::alert')
@section('content')

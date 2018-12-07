@extends('layouts.template')
<meta name="csrf-token" content="{{ csrf_token() }}">
@section('content')
  <div class="page-cadastrar">    
   <section id="conteudo-view" class="cadastrar-viagem">    
      <div class="nav-form">       
        <h2>{{$title ?? 'Cadastrar Viagem'}}</h2>
      </div>
      <div class="form-cadastro-viagem-cont"> 
        <!--Formulário utilizando a classe laravel *Por Padrão já vem com method POST *Gera um TOKEN-->
        @if(isset($result))
        {!! Form::open(['route' => 'viagem.editar', 'method' => 'post', 'class' => 'form-cadastro-viagem', 'enctype' => 'multipart/form-data', 'autocomplete' => 'off']) !!}   
        {{ Form::hidden('idViagem', $result->id) }}
        @else
        {!! Form::open(['route' => 'viagem.cadastrarViagem', 'method' => 'post', 'class' => 'form-cadastro-viagem', 'enctype' => 'multipart/form-data', 'autocomplete' => 'off']) !!}   
        @endif       
        
        {!! Form::text('destino', $result->destino ?? null, ['class' => 'input', 'placeholder' => $result->destino ??  'destino', 'required' => 'required'])!!}
        {!! Form::select('tipo', ['nacional' => 'Nacional', 'internacional' => 'Internacional', 'intercambio' => 'Intercâmbio'], $result->tipo ?? null, ['placeholder' => $result->tipo ??  'Tipo da Viagem', 'required' => 'required']) !!}
        {!! Form::select('transporte', ['onibus' => 'Onibus', 'carro' => 'Carro', 'aviao' => 'Avião'], $result->transporte ?? null, ['placeholder' => $result->transporte ??  'Transporte', 'required' => 'required']) !!}
        {!! Form::select('hospedagem', ['hostel' => 'Hostel', 'hotel' => 'Hotel', 'casa' => 'Casa'], $result->hospedagem ?? null, ['placeholder' => $result->hospedagem ??  'Hospedagem' , 'required' => 'required']) !!}        
        <p>Data Viagem</p>      
        {!! Form::date('data_inicial', \Carbon\Carbon::now(), ['class' => 'form-data', 'placeholder' => 'Data Inical da Viagem', 'required' => 'required']) !!}
        {!! Form::date('data_final', \Carbon\Carbon::now(), ['class' => 'form-data', 'placeholder' => 'Data Inical da Viagem' ]) !!}
        {!! Form::text('roteiro', $result->roteiro ?? null,['class' => 'input', 'placeholder' => $result->roteiro ??  'breve descrição da viagem'])!!}
        @if(isset($result))
        {!! Form::submit('Editar') !!}
        @else
        {!! Form::submit('Cadastrar') !!}
        @endif
        <!--Fecha Formulário-->
        {!! Form::close() !!}
        

      </div>
    </section>
  </div>
  @include('sweet::alert')
@endsection



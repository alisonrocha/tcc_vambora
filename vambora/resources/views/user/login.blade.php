<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>vambora | Momentos</title>
  </head>
  <body>
    <section id="conteudo-view" class="login">

      <h1>Vambora! viajar?</h1>
      <h3>Entre e conecte-se com mochileiros de várias partes do mundo.</h3>

      {!! Form::open(['route' => 'user.login', 'method' => 'post']) !!}

      <label>
        {!! Form::text('email', null, ['class' => 'input', 'placeholder' => 'usuário'])!!}
      </label>
      <label>
        {!! Form::password('senha', ['placeholder' => 'senha'])!!}
      </label>

        {!! form::submit('Entrar') !!}


      {!! form::close() !!}


    </section>



  </body>
</html>

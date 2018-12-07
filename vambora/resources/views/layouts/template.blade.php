<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Vambora</title>

        <!-- Icons -->
        <link rel="icon" type="imagem/png" href="/img/trip.png" />
        
        <!-- Styles -->
        <link href="{{ asset('/css/style.css') }}" rel="stylesheet"> 
        <link href="https://fonts.googleapis.com/css?family=Chicle|Days+One|Emblema+One|Goblin+One|Montserrat+Subrayada|Oxygen|Rye|Shojumaru|Shrikhand" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Black+Ops+One|Faster+One|Frijole|Patua+One" rel="stylesheet">
        
        <!-- Scripts -->
        <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
        <script src="{{ asset('js/main.js') }}"></script>        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />
        <script src="https://unpkg.com/sweetalert2@7.18.0/dist/sweetalert2.all.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
        <script src="/js/main.js"></script>
        @stack('links')
    </head>
    <body>
        <!-- Verifica se usuário está logado -->
        @if(session()->has('logado'))              
            @include('includes.nav-logado')            
            @yield('content')
        @else                    
            @yield('content')
        @endif
    </body>
</html>
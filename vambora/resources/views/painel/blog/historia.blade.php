<meta name="csrf-token" content="{{ csrf_token() }}">

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
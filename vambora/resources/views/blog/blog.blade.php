@extends('template.template-home')

@extends('template.template-nav')
@section('content')
 
<section class="blog">
    <div class="add-experiencia">
        <h2>Compartilhe suas melhores experiências</h2>         
    </div>
    <div class="btn-historia">
        <a href=""><p>Escrever história</p></a>
    </div>

    <div class="cont-blog">
        <div class="img-blog"> 
            <div class="esq">
                <img src="../img/re.jpg" alt="">
            </div>
            <div class="dir">
                <span>Titulo</span>
                <p>Por: Alison Rocha  data: 00/00/0000</p>
            </div>           
        </div>
        <div class="txt-blog">
            <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod numquam perspiciatis eveniet, repudiandae quae possimus velit quasi, veniam tempore cum cupiditate soluta repellendus, amet voluptas reiciendis doloremque natus culpa rerum! </p>
            <p>Fotos: Link</p>            
        </div>
    </div>
</section>


@include('sweet::alert')
@endsection
@extends('layouts.main')

@section('body-config')

@section('content')
<style>
    .tama{
        height: 30px;
        width: 30px;
    }

    .bg-secondary {
        border-radius: 20px;
        /* margin: 10px; */
        /* padding: 10%; */
        height: 20%;
        width: 20%;
        /* justify-content: center; */
}
</style>

<div class="row justify-content-center" >
    <div class="form-group col-md-3 col-6">
       @if(!$anterior)
       <input size="45" class="redondeado confondo form-control form-control-lg ml-2 w-40" name="categoria" type="text" placeholder="Buscar por Categoría" aria-label="Search">
    </div>
    @else
    <div class="form-group col-md-3 ">
        <input type="text" class="form-control" name="Categoria" placeholder="Buscar por Categoria" value="{{ (!$anterior['Categoria']) ? '' : $anterior['Categoria']}}">
    </div>
    @endif
        <button type="submit" class="btn btn-primary" style="width: 110px; height: 95%;">
          <i class="fas fa-search"></i> Buscar
        </button>
    <div class="form-group col-md-2 col-4">
        <a href="{{route('home')}}">
            <button type="button" class="btn btn-default" >
                <i class="fas fa-broom"></i> Limpiar filtro
            </button>
        </a>
    </div>
    {{-- <div class="col-sm-2" style="text-align: center">
        <button type="button" href="product.index">Categorias</button>
    </div> --}}

    {{-- <div class="col-2">
        {{ Form::label('Agregar Categoría', null, ['class' => 'col-sm-2 col-form-label']) }}
        {{ Form::number('', '', ['class' => 'form-control']) }}
        {{ Form::select('Agregar', ['class' => 'agregar']) }}
    </div> --}}

</div>
    <br>

    <div class="border-lines"></div>
    <br>


    <!--Empieza carusel de imagenes-->
<div class="row" style=" height: auto;  ">
    <div id="myCarouselCustom" class="carousel slide col-sm-12 col-12 bg-secondary" data-ride="carousel" style="height: 450px;">
        <h2 style="color: black">Mejores Precios</h2>
        <br><br>
        <!-- Indicators -->
        <ol class="carousel-indicators" style="">
            <li data-target="#myCarouselCustom" data-slide-to="0" class="active"></li>
            <li data-target="#myCarouselCustom" data-slide-to="1"></li>
            <li data-target="#myCarouselCustom" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner">
            <div class="item active ">
                {{-- {{dd($users )}} --}}
                @foreach($products as $product)
{{--
                    @if($product->imagenes->count() > 0)
                    <div class="item"> --}}
                        <div class="col-sm-2" id="mostrar">
                            <img class="d-block bg-ter bord" src="{{asset($product->imagenes[0]->url)}}" alt="First slide" style="width: 70%;">
                            <a href="product.show"></a>
                        </div>
                    {{-- </div>
                    @endif --}}
                    @endforeach

               {{-- <div class="col-sm-3"> <img class="d-block bg-ter bord" src="storage/auto.jpeg" alt="First slide" style="width: 100%;"></div>
                <div class="col-sm-3" style="margin: 0 40px"><img class="d-block bg-ter bord" src="storage/auto_paisaje.jpeg" alt="First slide" style="width: 80%; margin: 10px 0"></div>
                <div class="col-sm-3"><img class="d-block bg-ter bord" src="storage/pelotaas.jpg" alt="First slide" style="width: 80%;"></div>
                <div class="dol-sm-3"><img class="d-block bg-ter bord" src="storage/deportiva.jpg" alt="First slide" style="width: 15%; padding: 15px"></div> --}}
            </div>
            <div class="item">
                @foreach($products as $product)
                <div class="col-sm-2">
                    {{-- <img class="d-block bg-ter bord" src="{{asset($product->imagenes[0]->url)}}" alt="First slide" style="width: 70%;"> --}}
                </div>
                @endforeach
                {{-- <div class="col-sm-3" ><img class="d-block bg-ter   bord" src="storage/auto.jpeg" alt="First slide" style="width: 100%;"></div>
                <div class="col-sm-3"><img class="d-block bg-ter   bord" src="storage/auto_paisaje.jpeg" alt="First slide" style="width: 80%;"></div>
                <div class="col-sm-3"><img class="d-block bg-ter   bord" src="storage/pelotaas.jpg" alt="First slide" style="width: 80%;"></div>
                <div class="col-sm-3"><img class="d-block bg-ter   bord" src="storage/deportiva.jpg" alt="First slide" style="width: 60%;"></div> --}}
            </div>
            {{-- <div class="item"> --}}

                {{-- <div class="col-sm-2"> --}}
                    {{-- <img class="d-block bg-ter bord" src="{{asset($product->imagenes[0]->url)}}" alt="First slide" style="width: 100%;"> --}}
                {{-- </div> --}}
                {{-- <div class="col-sm-3"><img class="d-block bg-ter bord" src="storage/lampara.jpg"       alt="First slide" style="width: 80%;"></div>
                <div class="col-sm-3"><img class="d-block bg-ter bord" src="storage/sillas.jpg"        alt="First slide" style="width: 90%; padding: 15px 0"></div>
                <div class="col-sm-3"><img class="d-block bg-ter bord" src="storage/auto.jpeg"         alt="First slide" style="width: 100%;"></div>
                <div class="col-sm-3"><img class="d-block bg-ter bord" src="storage/auto_paisaje.jpeg" alt="First slide" style="width: 100%;"></div> --}}
            {{-- </div> --}}
        </div>
        <br><br>
    </div>
</div>
  <!--Termina carusel de imagenes-->


    <div class="row" style=" padding: $spacer !important; margin: 50px; justify-content: center;">
        <div class="col-sm-5 bg-secondary">
            <h2 style="color: black; text-align: center" >Explora lo mejor en hogar y cocina</h2>
            <br>
            <div class="row" style="justify-content: center">
                <img class="d-block bg-ter   offset-md-1  bord" src="storage/sillas.jpg" alt="First slide" style="width: 300px; height: auto;  flex-flow: column wrap;" >
                <br>
            </div><br>
            <div class="row" style="justify-content: center">
                <img class="d-block bg-ter offset-md-1 bord" src="storage/lampara.jpg" alt="First slide" style="width: 300px; height: 200px;  flex-flow: column wrap;" >
            </div>
        </div>
        <br>


        <div class="col-sm-5 bg-secondary">
            <h2 style="color: black; text-align: center">Lo mejor en deportes</h2>
            <br>
            <div class="row">
                <img class="d-block bg-ter bord" src="storage/deportiva.jpg" alt="First slide" style="width: 60%; height: auto;  flex-flow: column wrap;" >
                <div class="col-sm-4">
                    <img class="bg-ter bord" src="storage/pelotaas.jpg" alt="First slide" style="width: 200px; height: auto; flex-flow: column wrap;" >
                    <br><br>
                    <img class="d-block bg-ter bord" src="storage/gorra_deportiva.jpg" alt="First slide" style="width: 120%; height: auto;  flex-flow: column wrap;" >
                </div>
            </div>
        </div>
    </div>

<script type="text/javascript">
    // Call carousel manually
    $('#myCarouselCustom').carousel();

    // Go to the previous item
    $("#prevBtn").click(function(){
        $("#myCarouselCustom").carousel("prev");
    });
    // Go to the previous item
    $("#nextBtn").click(function(){
        $("#myCarouselCustom").carousel("next");
    });




    function mostrar(mostrar)
    {
        for(i = 0; i < 3; i ++)
        {
            console.log(x[i]);
        }
    }
    mostrar()

    </script>


@endsection

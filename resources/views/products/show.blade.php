@extends('layouts.main')

@section('content')

<style>
    .bord{
        border: 3px darkgrey outset;
        border: groove;
        border-radius: 15px;
    }

    header {
        /* background-color: transparent; */
        margin: 10px;
        /* -webkit-text-emphasis-style: dot; */
    }

    .border-lines {
        background-color: darkgrey;
        height: 10px;
        width: 75%;
    }

    .ofertar-style {
        border-radius: 10px;
        padding-top: 5px;
        width: 50%;
        min-width: 250px;
    }

    body {
        font-size: 10px;
    }
</style>
@php
$index=0;
@endphp

@if ($product->status == 1)
<section style=" margin: 0 -15% 0 10%">
    <div class="border-lines"></div>

    <div class="row" style="padding: 5px; margin: 10px">
        @if ($product->imagenes->count() >= 0)
            <div class="col-lg-1 col-7 text-center" style="flex-flow: wrap; z-index: 100">

                @for ($i = 1; $i < 1; $i++)
                    <img class="col-lg-4 col-12" src="{{asset($product->imagenes[$i]->url)}}" alt="adasd.jpg" width="30" class="mx-auto margen d-block img-fluid" style="height: auto; width:120px; transform:translateX(20%); border: 2px solid DodgerBlue;">
                @endfor
                @foreach ($product->imagenes as $imagen)
                    {{-- {{dd($product->imagenes)}} --}}
                    <div style="margin: 2px; border-color: blue; border-left-style: solid;">
                        <img src="{{asset($imagen->url)}}" alt="adasd.jpg" style="height: auto; width: 100px;" onclick="imageSelected(@php echo $index; @endphp, '{{asset($imagen->url)}}')">
                    </div>
                    @php
                        $index++;
                    @endphp
                @endforeach
            </div>
            <div class="col-lg-5 col-7 text-center">
                <img id="myImg" src="{{asset($product->imagenes[0]->url)}}" alt="adasd.jpg" style="height: auto; width: 80%;">
            </div>
        @endif
        <div class="col-lg-2 text-center">
            <br>
            <h2> Fecha de expiración:</h2>
            <h4 class="card-text" id="calc"> {{ $product->fechaFinal}} </h4>
            <br>
            <div class="col">
                <h1 class="card-text text-capitalize">{{$product->titulo}}</h1>
                <p>Vendido por: <p class="color">{{$product->user->name}}</p></p>
                <div class="col-lg-12 text-center">
                    <div class="bg-secondary text-center bg-secondary-mine" style="border-radius: 15px">
                        <div class="row" style="margin-left: inherit">
                            <br>
                            <div class="col-lg-9">
                                <br>
                                <h4 class=" text-center">Oferta Actual</h4>
                                <table width=300 cellspacing=0 cellpadding=0 bgcolor="#333399" border=0>
                                    {{ Form::open(['route' => ['offer.store', $product], 'method' => 'post'] ) }}
                                        <div class="col text-center bg-secondary text-justify">
                                            <input type="hidden" name="product_id" value="{{$product->id }}">
                                            <input name="oferta" class="form-control text-center" type="text" min="1" placeholder="Ofertar" pattern="[+]?([0-9]*[.])?[0-9]+" value="" id="oferta_maxima">
                                            <p type="text" id="demo">Ofrecer {{ $product->ofertas()->max('oferta')+1 }} $ o más</p>

                                            {{Form::submit('Ofertar', ['class' => 'btn btn-primary mb-5'])}}

                                        </div>
                                    {{ Form::close()}}
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@if(isset($product))



<section style=" margin: 0 -15% 0 10%">
    <div class=" border-lines"></div>
    <div class="row-10 intro">
        <div class="col-lg-5 col-sm-3 text-center mx-auto d-block">
            <br>
            {{-- <div class="border-lines"></div> --}}
            <br>

            <h2>Caracteristicas</h2>
            <p class="card-text">Titulo: {{ $product->titulo }}</p>
            <p class="card-text">Categoría: {{ $product->categoria}}</p>
            <p class="card-text">Condición: {{ $product->condicion }}</p>
            <p class="card-text">Marca: {{ $product->marca }}</p>
            <p class="card-text">Descripción: {{ $product->descripcion }}</p>

        </div>
        <div class="col-6 col-sm-3 text-center mx-auto d-block">
            <div class="table-responsive  text-center">
                <div class="col-sm-6"><br>
                    <h2 class="elemento strong">Ultimas Ofertas</h2>
                </div>
                <table class="table table-striped" style="text-align:center">
                    <thead class="letra">
                        <tr>
                            <th>Descripción</th>
                            <th>Precio Reserva</th>
                            <th>Fecha/Hora de Inicio</th>
                        </tr>
                    </thead>
                    <tbody class="thead-dark">
                        <tr>
                            <td scope="col">{{$product->descripcion}}</td>
                            <td scope="col">{{$product->precioReserva}}</td>
                            <td scope="col">{{$product->fechaInicio}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <br>
            <div class="row-3">
                <div class="col float-right">
                    <br>
                    {{ Form::open(['route' => ['product.index', $product], 'method' => 'get'] ) }}
                    {{Form::submit('Ver todas las ofertas', ['class' => 'btn btn-primary mb-5'])}}
                    {{Form::close()}}
                </div>
            </div>
        </div>
    </div>
</section>

@endif



@else
<div class="container">
   <div class="row-2">
       <div class="col-lg-8" style="margin: auto">
            <h1 style="margin:4%; justify-content: center"><strong>Subasta Ganadora</strong> </h1>
       </div>
   </div>
   <br>
</div>

<div class="row" style="justify-content: center">
  <section class="col-lg-8 col-10 bord" style="justify-content: center; padding: 30px; border: double">
    @if ($product->imagenes->count() >= 0)
        <div class="col-lg-1 col-7 text-center"  style="flex-flow: wrap; z-index: 100">
            @for ($i = 1; $i < 1; $i++)
                <img class="col-lg-4 col-12" src="{{asset($product->imagenes[$i]->url)}}" alt="adasd.jpg" width="30" class="mx-auto margen d-block img-fluid" style="height: auto; width:120px; transform:translateX(20%); border: 2px solid DodgerBlue;">
            @endfor
            @foreach ($product->imagenes as $imagen)
                 <div style="margin: 2px; border-color: blue; border-left-style: solid;">
                    <img src="{{asset($imagen->url)}}" alt="adasd.jpg" style="height: auto; width: 80px;" onclick="imageSelected(@php echo $index; @endphp, '{{asset($imagen->url)}}')">
                </div>
                @php
                    $index++;
                @endphp
            @endforeach
        </div>
        <div class="col-lg-5 col-7 text-center" >
            <img id="myImg" src="{{asset($product->imagenes[0]->url)}}" alt="adasd.jpg" style="height: auto; width: 80%;">
        </div>
    @endif
        <div class="col-lg-4 tam">
            <h1 class="font-weight-bold "></h1>
            <p class="text-success font-weight-bold">Envio gratis</p>
            <p>vendido por: user_1</p>
            <h2 class="text-primary font-weight-bold">${{ $product->ofertas()->max('oferta') }} GOI</h2>
            <p>Fecha de entrega estimada: 15 de junio </p>
        </div>
  </section>
</div>
<br><br><br><br>
<div class="row" style="justify-content: center;">
    <section class="bord col-lg-8 col-10" style="justify-content: center;  padding: 30px; border: double">
        <div class="col-lg-8" >
            <h1>Dirección de entrega</h1>
            <h3>Av. Patria #512, Prados Vallarta, 45020, Zapopan, Jalisco, Mexico</h3>
        </div>
    </section>
</div>



@endif
<script>
    function sleep(ms) {
        return new Promise(resolve => setTimeout(resolve, ms));
    }

    elemento = document.getElementById('reloj');

    async function setTime(){
        while (true) {
            var rest = 10;
            for (let index = 0; index <= 10; index++) {
                elemento.innerText = rest;
                console.log(rest);
                rest = rest - 1;
                await sleep(1000);
            }
        }
    }
    setTime();
    console.log("entra");
</script>
<script>
    function imageSelected(index, url){
    var img = document.getElementById("myImg");
    img.src = url;
    console.log(index);
    console.log(url);
}


function myFunction() {
    a = a + 1;
}
document.getElementById("demo").innerHTML = a;
</script>
@endsection

@extends('layouts.main')

@section('content')
<style>

    header {
        /* background-color: transparent; */
        margin:10px;
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
    body{
        font-size: 10px;
    }
</style>
@php
$index=0;
@endphp
<section style="margin-left: 10%">
        <div class="border-lines"></div>
    <div class="row">
        <div class="row" style="padding: 5px; margin: 10px">
            <div class="col-lg-1 col-7 text-center"  style="flex-flow: wrap; z-index: 100">
                @if ($product->imagenes->count() >= 0)
                @for ($i = 1; $i < 1; $i++)
                 <img class="col-lg-4 col-12" src="{{asset($product->imagenes[$i]->url)}}" alt="adasd.jpg" 
                 width="30" class="mx-auto margen d-block img-fluid" style="height: auto; width:120px; transform:translateX(20%); border: 2px solid DodgerBlue;">
              
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
        <div class="col-lg-5 col-7 text-center" >
            <img id="myImg" src="{{asset($product->imagenes[0]->url)}}" alt="adasd.jpg" style="height: auto; width: 80%;">
        </div>
        @endif
       
        <div class="col-lg-2 text-center">
            <br>
            {{-- <h2 id="reloj"></h2> --}}
            <h2> Fecha de expiración:</h2>
            {{-- @foreach($fechaFinal == false) --}}
            <h4 class="card-text" id="calc"> {{ $product->fechaFinal}} </h4>
            <br>
            <div class="col">
                <h1 class="card-text text-capitalize">{{$product->titulo}}</h1>
                <p>Vendido por: <p class="color">user_01</p></p>

                {{-- @foreach ($v -> $oferta as $ofer)
                        @if ($ofer->ganador == true)
                            {{ $ofer -> user()}}
                @endif
                @endforeach --}}
                <p><span style="color: blue">350 GOI</span>  Mejor oferta al momento</p>
                    
                <div class="col-lg-12 text-center">
                    <div class="bg-secondary text-center bg-secondary-mine">
                        <div class="row" style="margin-left: inherit">
                            <br>
                            <div class="col-lg-11">
                                <br>
                                <h4 class=" text-center">Oferta Actual</h4>
                                <table width=300 cellspacing=0 cellpadding=0 bgcolor="#333399" border=0>
                            </div>
                            
                            {{ Form::open(['route' => ['subasta.store', $product], 'method' => 'post'] ) }}

                            <div class="col text-center bg-secondary text-justify">
                                <input type="hidden" name="product_id" value="{{$product->id }}">
                                <input name="oferta" class="form-control text-center" type="text" min="1"
                                    placeholder="Ofertar" pattern="[+]?([0-9]*[.])?[0-9]+" id="oferta">
                                <p type="text" style="">Ofrecer $ o más</p>

                                {{Form::submit('Ofertar', ['class' => 'btn btn-primary mb-5'])}}

                            </div>
                        </table>
                            {{Form::close()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>


<section style="margin-left: 10%">
    <div class="border-lines"></div>
    <div class="row-8 intro">
        <div class="col-lg-5 col-sm-3 text-center mx-auto d-block">
            <br>
            <div class="border-lines"></div>
            <br>
            <h2>Caracteristicas</h2>
            <p class="card-text">Titulo: {{$product->titulo}}</p>
            <p class="card-text">Categoría: {{$product->categoria}}</p>
            <p class="card-text">Condición: {{$product->condición}}</p>
            <p class="card-text">Marca: {{$product->marca}}</p>
            <p class="card-text">Descripcion: {{$product->descripcion}}</p>
        </div>


        <div class="col-6 col-sm-3 text-center mx-auto d-block">

            <div class="table-responsive  text-center">

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
            </div>
                    </tbody>

            <br>
            <div class="row-3">
               
                <div class="col float-right">
                    <br>
                    {{ Form::open(['route' => ['product.index', $product], 'method' => 'get'] ) }}
                    {{Form::submit('Ver todas las ofertas', ['class' => 'btn btn-primary mb-5'])}}
                    {{Form::close()}}
                </div>
                <div class="col-sm-6"><br>
                    <h2 class="elemento strong">Ultimas Ofertas</h2>
                </div>
            </div>
        </div>

    </div>
    
    </div>
</section>



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
</script>

@endsection
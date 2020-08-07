@extends('layouts.main')

@section('content')

<style>

    .bord{
        border: 3px darkgrey outset;
        border: groove;
        border-radius: 15px;
    }
</style>

@php
$index=0;
@endphp
{{-- subatas Finalizada --}}

<section class="row-2" style="margin: 15px">

    <div class="col-lg-12 ">
        {{ Form::open(['route' => ['subasta.index'], 'method' => 'get'] ) }}
        <input type="hidden" name="product_id" value="">
        {{Form::submit('Regresar <<', ['class' => 'btn btn-primary mb-5'])}}

        {{ Form::close() }}
    </div>
</section>

<div class="row">
   <div class="col-lg-8" style="margin: auto">
    <h1 style="margin:2%; justify-content: ">Subasta Ganadora</h1>
   </div>

</div>

<br>

<div class="row" style="justify-content: center">
  <section class="col-lg-8 col-10 bord" style="justify-content: center">

    @if ($product->imagenes->count() >= 0)
        <div class="col-lg-1 col-7 text-center"  style="flex-flow: wrap; z-index: 100">
            @for ($i = 1; $i < 1; $i++)
            <img class="col-lg-4 col-12" src="{{asset($product->imagenes[$i]->url)}}" alt="adasd.jpg"
            width="30" class="mx-auto margen d-block img-fluid" style="height: auto; width:120px; transform:translateX(20%); border: 2px solid DodgerBlue;">

            @endfor
            @foreach ($product->imagenes as $imagen)
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
    <div class="col-lg-4 tam">
        <h1 class="font-weight-bold "></h1>
        <p class="text-success font-weight-bold">Envio gratis</p>
        <p>vendido por: user_1</p>
        <h2 class="text-primary font-weight-bold"><strong>${{ $product->ofertas()->max('oferta') }} GOI  </strong></h2>
        <p>Fecha de entrega estimada: 15 de junio </p>
    </div>
  </section>
</div>


<br><br><br><br><br><br><br><br><br><br>

<div class="row" style="justify-content: center">
<section class="bord col-lg-8 col-10" style="justify-content: center">
        <div class="col-lg-8" >
            <h1>Dirección de entrega</h1>

            <h3> <img src="/storage/ubicacion.jpg" alt="" style="width:2rem" height="3%"> Av. Patria #512, Prados
                Vallarta, 45020, Zapopan, Jalisco, Mexico</h3>

        </div>
    </div>
</section>

</div>

<script>
    function imageSelected(index, url){
        var img = document.getElementById("myImg");
        img.src = url;
    }
</script>

@endsection

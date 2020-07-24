@extends('layouts.main')


@section('breadcrumbs')

@section('content')

<style>
    .info {
      opacity: 0.5;
    }
    .tam {
        font-size: 1.35rem;
    }
    }
    </style>
<div class="container">
    <div clas="row-2">

        {{ Form::open(['route' => ['home'], 'method' => 'get'] ) }}
        <input type="hidden" name="product_id" value="">
        {{Form::submit('Regresar <<', ['class' => 'btn btn-primary mb-5'])}}

        {{ Form::close() }}
        <h1>Mis Subastas</h1>
    </div>
</div>
{{--
{{dd($subasta)}}
--}}

{{-- 
@if($products->fechaFinal ?? ' ')
<style>
    .opacity-if {
        filter: opacity(0.5);
    }
</style>
 entra aqui 2 
 @else
entra aqui
 @endif
 --}}
<body>
    <div class="table-responsive">
        <table id="example" class="table table-striped table-bordered" style="width:100%">
            <div class="container">
                {{-- {{dd()}} --}}
                @foreach ( $products as $products)
                 
                <div class="row intro">
                    
                    <div class="col opacity-if ">
                        {{-- {{ $product->imagenes->count() }}  --}}
                        @if ($product->imagenes->count() > 0)
                            @for ($i = 0; $i < 1; $i++) 
                                <img src="{{asset($product->imagenes[$i]->url)}}" alt="adasd.jpg" width="200">
                            @endfor
                        @endif
                    </div>
                    <div class="col info opacity-if ">
                        <h2 class="card-text">{{$product->marca}}</h2>
                        <p class="card-text">350 GOI Mejor oferta al momento </p>
                        <p class="card-text">(81 ofertas de subasta)</p>
                        <p class="card-text">Envio gratis</p>
                    </div>
                    <div class="row">
                        <div class="col opacity-if ">
                            <p class="card-text">Finalizacion de la subasta: {{$product->fechaFinal}}</p>
                            <p class="card-text">De: Guadalajara. Jal.</p>
                            <p class="card-text">México</p>
                            <p class="card-text">Envió Nacional</p>
                        </div>
                        <div class="col float-right align-self-end">
                            {{ Form::open(['route' => ['subasta.show', $product], 'method' => 'get'] ) }}
                            <input type="hidden" name="product_id" value="{{$product->id}}">
                            {{Form::submit('Más Detalles', ['class' => 'btn btn-primary  mb-5'])}}

                            {{ Form::close() }}
                        </div>
                    </div>

                </div>
                <br>
                @endforeach
            </div>
        </table>
    </div>
</body>

@endsection
@extends('layouts.main')

@section('content')

<style>
    .info {
      opacity: 0.5;
    }
    .tam {
        font-size: 1rem;
    }
    body{

    }
    }
    </style>

    <div clas="row-2">

        {{ Form::open(['route' => ['product.index'], 'method' => 'get'] ) }}
        <input type="hidden" name="product_id" value="">
        {{Form::submit('Regresar <<', ['class' => 'btn btn-primary mb-5 '])}}

        {{ Form::close() }}


    <div class="table-responsive">
        <table id="example" class="table table-striped table-bordered" style="width:100%">
                @foreach ( $products as $product)
                 
                <div class="row intro">
                    
                    <div class="col opacity-if ">
                        {{-- {{ $product->imagenes->count() }}  --}}
                        @if ($product->imagenes->count() > 0)
                            @for ($i = 0; $i < 1; $i++) 
                                <img src="{{asset($product->imagenes[$i]->url)}}" alt="adasd.jpg" width="200">
                            @endfor
                        @endif
                    </div>
                    <div class="col info opacity-if tam">
                        <h2 class="card-text">{{$product->marca}}</h2>
                        <p class="card-text">350 GOI Mejor oferta al momento </p>
                        <p class="card-text">(81 ofertas de subasta)</p>
                        <p class="card-text">Envio gratis</p>
                    </div>
                    <div class="row">
                        <div class="col opacity-if tam">
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


@endsection
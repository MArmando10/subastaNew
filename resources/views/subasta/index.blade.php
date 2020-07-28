@extends('layouts.main')

@section('content')

<style>
    .info {
      opacity: 0.5;
    }
    .tam {
        font-size: 1rem;
    }
    body {
        background-color: transparent;
        /* margin:10px; */
        /* -webkit-text-emphasis-style: dot; */
    }
    .letra {
        color: white;
    }

    .border-lines {
        background-color: darkgrey;
        height: 10px;
    }
    }
    </style>
<div class="row-3" style="margin: 45px; padding: 30px">

    {{ Form::open(['route' => ['product.index'], 'method' => 'get'] ) }}
    <input type="hidden" name="product_id" value="">
    {{Form::submit('Regresar <<', ['class' => 'btn btn-primary mb-5 '])}}

    {{ Form::close() }}

{{-- <div class="table-responsive"> --}}
    <div class="border-lines"></div>
         <table id="example" class="table table-striped table-bordered" style="width:100%">
        <br><br>
            @foreach ( $products as $product)
                <div class="row">
                    <div class="col-lg-8 opacity-if ">
                     {{-- {{ $products->imagenes->count() }}   --}}
                    
                      @if ($products->imagenes->count() > 0)
                        @for ($i = 0; $i < 1; $i++) 
                            <img src="{{asset($products->imagenes[$i]->url)}}" alt="adasd.jpg"width="150">
                        @endfor
                     @endif 

                    </div>
                <div class="col  tam">
                    <h2 class="card-text letra">{{$product->marca}}</h2>
                    <p class="card-text letra">350 GOI Mejor oferta al momento </p>
                    <p class="card-text letra">(81 ofertas de subasta)</p>
                    <p class="card-text letra">Envio gratis</p>
                </div>
                <div class="row">
                    <div class="col opacity-if tam">
                        <p class="card-text letra">Finalizacion de la subasta: </p>
                        <p class="card-text letra">De: Guadalajara. Jal.</p>
                        <p class="card-text letra">México</p>
                        <p class="card-text letra">Envió Nacional</p>
                    </div>
                    <div class="col-7 float-right align-self-end">
                        {{ Form::open(['route' => ['subasta.show', $product], 'method' => 'get'] ) }}
                        <input type="hidden" name="product_id" value="{{$product->id}}">
                        {{Form::submit('Más Detalles', ['class' => 'btn btn-primary  mb-5'])}}

                        {{ Form::close() }}
                    </div>
                </div>

                </div>
            <br>
            <div class="border-lines"></div>
            @endforeach
        </div>
    
    </table>
    {{-- <div class="border-lines"></div> --}}
  
  
</div>

@endsection
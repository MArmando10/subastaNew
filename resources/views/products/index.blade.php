@extends('layouts.main')

@section('content')

<style>
    body{
    background-color: transparent;
    /* -webkit-text-emphasis-style: dot; */
    }

    .border-lines {
  background-color: darkgrey;
  height: 10px;
}
    </style>
<div class="row">
    <div class="col">
        
            <div class="row border-lines"></div> <!-- Linea superior -->

            <div class="table-responsive ">

                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <div class="container">
                        {{-- @foreach ($Users as $user)
                        @foreach ( $user->products as $product) --}}
                        <div class="row intro">
                            <div class="col-6">
    
                                <img src="storage/auto.jpg" alt="">
                                {{-- {{ $products->imagenes->count() }} --}}
                                {{-- @if ($product->imagenes->count() > 0)
                                @for ($i = 0; $i < 1; $i++) <img src="{{asset($product->imagenes[$i]->url)}}"
                                    alt="adasd.jpg" width="200">
                                    @endfor
                                    @endif --}}
    
    
                            </div>
                            <div class="col-3  tamle">
                                <h2 class="card-text">{{$product->titulo}}titulo</h2>
                                <p class="card-text">{{$product->marca}} marca</p>
                                <p class="card-text">{{$product->precioInicial}} precio Inicial</p>
                            </div>
                            <div class="row">
                                <div class="col-3 tamle">
                                    {{-- <p class="card-text">{{$product->descripcion}} descripcion</p> --}}
                                    {{-- <p class="card-text">{{$product->precioReserva}} precio Reserva</p> --}}
    
                                    {{-- @foreach ($products as $product)
                                        @if ($product->status==finish)
                                            @yield(layoutss::view:make('layoutss.ganadora')); 
    
                                        @else ($product->status==pendiente)
                                            @yield(layoutss::view:make('products.show'));
                                        @endif --}}
    
                                    {{-- {{Form::open(['route' => ['product.show', $product], 'method' => 'get'] ) }}
                                    {{Form::submit('Más Detalles', ['class' => 'btn btn-secondary mb-5'])}}
    
                                    {{Form::close()}} --}}
                                    {{-- @endforeach --}}
    
                                </div>
                            </div>
    
                        </div>
                        <br>
                        {{-- @endforeach
                        @endforeach --}}
                    </div>
                </table>
            </div>
       </div>
</div>

@endsection
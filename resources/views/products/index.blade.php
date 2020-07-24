@extends('layouts.main')

@section('content')

<style>
    body {
        background-color: transparent;
        margin:10px;
        /* -webkit-text-emphasis-style: dot; */
    }

    .border-lines {
        background-color: darkgrey;
        height: 10px;
    }
    
</style>
<div >
<body >
    <div class="table-responsive ">
        <table id="example" class="table table-striped table-bordered" style="width:100%">
            <div class="container ">
                @foreach ($Users as $user)
                @foreach ($Product as $products)
                <div class="row intro">
                    <div class="col">

                        {{-- {{ $products->imagenes->count() }}  --}}
                         @if ($products->imagenes->count() > 0)
                        @for ($i = 0; $i < 1; $i++) <img src="{{asset($products->imagenes[$i]->url)}}" alt="    "
                            width="200">
                            @endfor
                            @endif 
                    </div>
                    <div class="col  tamle">
                         <h2 class="card-text">{{$products->titulo}}</h2>
                        <p class="card-text">{{$products->marca}}</p>
                        <p class="card-text">{{$products->precioInicial}}</p> 
                    </div>
                    <div class="row">
                        <div class="col tamle">
                            <p class="card-text">{{$products->descripcion}}</p>
                            <p class="card-text">{{$products->precioReserva}}</p> 

                            {{-- @foreach ($products as $product)
                            @if ($product->status==finish)
                                {{-- @yield(layoutss::view:make('layoutss.ganadora'));  --}}

                            {{--@else ($product->status==pendiente)
                                 @yield(layoutss::view:make('products.show')); 
                            @endif--}}

                             {{ Form::open(['route' => ['subasta.show', $products], 'method' => 'get'] ) }}
                            {{Form::submit('Más Detalles', ['class' => 'btn btn-secondary mb-5'])}}

                            {{ Form::close() }} 
                            {{-- @endforeach --}}

                        </div>
                    </div> 

                </div>
                <br>
                @endforeach
                @endforeach
            </div>
        </table>
    </div>
    </body>
</div>

@endsection
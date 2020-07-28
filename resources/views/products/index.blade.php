@extends('layouts.main')

@section('content')

<style>

    body {
        /* background-color: transparent; */
        /* margin:10px; */
        /* -webkit-text-emphasis-style: dot; */
        font-size: 1.05rem;
    }

    .border-lines {
        background-color: darkgrey;
        height: 10px;
    }

    /* .letra {
        color: white;
    } */
   
</style>

<div class="row-3" style="margin: 65px; padding: 30px">
    <div class="col-lg-6">
              <div class="d-flex justify-content-center">
                <div class="searchbar">
                  <input class="search_input" type="text" name="" placeholder="Search...">
                  <a href="#" class="search_icon"><i class="fas fa-search"></i></a>
                </div>
              </div>
       




        {{-- <form action="search" method="POST" role="searchBuscar">
            {{ csrf_field() }}
            <div class="d-flex " style="text-align: center">
                @if ( !isset($anterior) )
                <input type="text" class="form-control-8" name="categoria" placeholder="Buscar por categoria" value="">
                @else
                <input type="text" class="form-control" name="categoria" placeholder="Buscar por categoria" value="">
                @endif

                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-search"></i> Buscar
                </button>

            </div>
        </form> --}}
        <br><br>
        <div class="border-lines"></div>
       
            <table id="example" class="table table-striped table-bordered" style="width:100%">

                @foreach ($Users as $user)
                @foreach ( $user->products as $product)
                <br>
                <div class="row intro">
                    <div class="col-lg-6 col-12 text-center">
                        {{-- {{ $products->imagenes->count() }} --}}
                        @if ($product->imagenes->count() > 0)
                        @for ($i = 0; $i < 1; $i++) <img src="{{asset($product->imagenes[$i]->url)}}"alt="adasd.jpeg" width="150">
                            @endfor
                            @endif
                    </div>

                    <div class="col info letra tam">
                        <h2 class="card-text ">{{$product->marca}}</h2>
                        <p class="card-text ">350 GOI Mejor oferta al momento </p>
                        <p class="card-text">(81 ofertas de subasta)</p>
                        <p class="card-text">Envio gratis</p>
                    </div>
                    <div class="row">
                        <div class="col letra tam">
                            <p class="card-text">Finalizacion de la subasta: {{$product->fechaFinal}}</p>
                            <p class="card-text">De: Guadalajara. Jal.</p>
                            <p class="card-text">México</p>
                            <p class="card-text">Envió Nacional</p>
                        </div>
                        <div class="col float-right align-self-end">
                            {{-- @foreach ($products as $product)
                                    @if ($product->status==finish)
                                        @yield(layoutss::view:make('layoutss.ganadora')); 

                                    @else ($product->status==pendiente)
                                        @yield(layoutss::view:make('products.show'));
                                    @endif --}}
                                
                            {{ Form::open(['route' => ['product.show', $product], 'method' => 'get'] ) }}
                            {{Form::submit('Más Detalles', ['class' => 'btn btn-secondary mb-5'])}}

                            {{ Form::close() }}
                            {{-- @endforeach --}}

                    </div>
                </div>
                    
                </div>
                    <br>
                <div class="border-lines"></div>
                <br>
                @endforeach
                @endforeach
     
             {{-- <div class="border-lines"></div> --}}
        </table>

    </div>
</div>

@endsection
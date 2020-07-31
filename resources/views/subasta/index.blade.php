@extends('layouts.main')

@section('content')

<style>
    body {
        font-size: 1.05rem;
    }

    .border-lines {
        background-color: darkgrey;
        height: 10px;
    }
    /* # {
  opacity: 0.6;
} */

   
</style>
<br>
<div class="row col-lg-6 justify-content-center"><h1><strong>Estas en Subastas</strong></h1></div>
<div class="row-3" style="margin: 65px; padding: 30px">
    <div class="col-lg-6" style="min-width: 100%">
        {{-- <div class="hero-productos">
            <div class="container h-100" action={{ route('buscar.show') }}>
                <div class="row h-100 align-items-center">
                    <div class="col md-4 texto-buscar">
                        <p class="display-4">Buscar productos</p>

                        <input type="search" name="buscar" class="form-control" placeholder="Buscar por categoria" />
                    </div>
                </div>
            </div>
        </div>   --}}
        <div class="d-flex justify-content-center">
            <div class="searchbar h-100" action={{ route('buscar.show')}}>
                <input class="search_input" type="text" name="categoria" placeholder="Buscar por Categoria">
                <a href="#" class="search_icon"><i class="fas fa-search"></i></a>
            </div>
        </div> 
              

        <br><br>
        <div class="border-lines"></div>
       
            <table id="example" class="table table-striped table-bordered" style="width:100%">

                @foreach ($Users as $user)
                    @foreach ( $user->products as $product)
                        <br>
                        <div class="col termino">
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
                                    <div class="col tam">
                                        <p class="card-text">Finalizacion de la subasta: {{$product->fechaFinal}}</p>
                                        <p class="card-text">De: Guadalajara. Jal.</p>
                                        <p class="card-text">México</p>
                                        <p class="card-text">Envió Nacional</p>
                                    </div>
                                </div>
                                <div class="col float-right align-self-end">
                                    @if ($product->status==1)
                                        {{ Form::open(['route' => ['product.show', $product], 'method' => 'get'] ) }}
                                        {{ Form::submit('Más detalles', ['class' => 'btn btn-primary mb-5'])}}{{--debe de ser mas detalles, haciendo prueba para vista ganadora--}}
                                        {{ Form::close() }}
            
                                    @else
                                        {{ Form::open(['route' => ['product.show', $product], 'method' => 'get'] ) }}
                                        {{ Form::submit('Finalizado', ['class' => 'btn btn-primary mb-5'])}}{{--debe de ser mas detalles, haciendo prueba para vista ganadora--}}
                
                                        {{ Form::close() }}
            
                                    @endif
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
</div>

@endsection
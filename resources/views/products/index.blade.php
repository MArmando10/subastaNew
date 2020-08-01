@extends('layouts.main')

@section('content')

<style>
    body {
        font-size: 1.05rem;
    }

    .tableMar{
        margin: 50px;
    }
    .border-lines {
        background-color: darkgrey;
        height: 10px;
    }
</style>

<div class="row col-lg-6 justify-content-center" ><h1><strong> Estas en productos</strong></h1></div>
<div class="row-3" style="margin: 65px; padding: 30px">
    <div class="col-lg-6" style="min-width: 100%;">
        <div class="d-flex justify-content-center">
            <div class="searchbar">
                <input class="search_input    " type="text" name="categoria" placeholder="Buscar por Categoria">
                <a href="{{ route('product.index')}}" class="search_icon"><i class="fas fa-search"></i></a>
            </div>
        </div>
        
        <br><br>
        <div class="border-lines"></div>
      
    @if ($products->isEmpty())
            <div><h3>No hay Productos</h3></div>
        @else

        @foreach ($products as $product)
            {{-- {{dd($products)}} --}}
        @endforeach
        
<table id="example" class="table table-striped table-bordered tableMar" style="width:100%">
    @foreach ($Users as $user)
        @foreach ( $user->products as $product)
            @if ($product->status==1)
            <br>
                <div class="row intro">
                    <div class="col-lg-6 col-12 text-center">
                        {{-- {{ $products->imagenes->count() }} --}}
                        @if ($product->imagenes->count() > 0)
                            @for ($i = 0; $i < 1; $i++) <img src="{{asset($product->imagenes[$i]->url)}}" alt="adasd.jpeg" width="150">
                            @endfor
                        @endif
                    </div>
                    <div class="col info letra tam">
                        <h2 class="card-text ">{{$product->marca}}</h2>
                        <p class="card-text ">350 GOI Mejor oferta al momento </p>
                        <p class="card-text">(81 ofertas de subasta)</p>
                        <p class="card-text">Envio gratis</p>
                    </div>
                    <div class="col tam">
                        <p class="card-text">Finalizacion de la subasta: {{$product->fechaFinal}}</p>
                        <p class="card-text">De: Guadalajara. Jal.</p>
                        <p class="card-text">México</p>
                        <p class="card-text">Envió Nacional</p>
                    </div>
                    <div class="col float-right align-self-end">
                        @if ($product->status==1)
                            {{ Form::open(['route' => ['product.show', $product], 'method' => 'get'] ) }}
                            {{ Form::submit('mas detalles', ['class' => 'btn btn-primary mb-5'])}}{{--status-1 debe de ser mas detalles, haciendo prueba para vista subasta.show--}}
                            {{ Form::close() }}
                     
                            @else
                            {{ Form::open(['route' => ['subasta.show', $product], 'method' => 'get'] ) }}
                            {{ Form::submit('mas detalles', ['class' => 'btn btn-primary mb-5'])}}{{--status-0 debe de ser mas detalles, haciendo prueba para vista ganadora--}}
                            {{ Form::close() }}
                        @endif
                    </div>
                </div>
                <br>
                <div class="border-lines"></div>
            @endif
            <br>
            @endforeach
        @endforeach   
    {{ $products->links() }} 
</table>
    @endif
    </div>
</div>
      
   
@endsection
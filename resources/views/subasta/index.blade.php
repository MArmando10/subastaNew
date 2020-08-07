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
</style>
<br>

<div class="row col-lg-6 justify-content-center"><h1><strong>Estas en Subastas</strong></h1></div>

<div class="row-3" style="margin: 65px; padding: 30px">
    <div class="col-lg-6" style="min-width: 100%">

        <div class="row justify-content-center" >
            <div class="form-group col-md-3">
               @if(!$anterior)
               <input size="45" class="redondeado confondo form-control form-control-lg ml-2 w-40" name="categoria" type="text" placeholder="Buscar por Categoría" aria-label="Search">
            </div>
            @else
            <div class="form-group col-md-3">
                <input type="text" class="form-control" name="Categoria" placeholder="Buscar por Categoria" value="{{ (!$anterior['Categoria']) ? '' : $anterior['Categoria']}}">
            </div>
            @endif
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-search"></i> Buscar
            </button>
            <a href="{{route('subasta.index')}}"><button type="button" class="btn btn-default">
                <i class="fas fa-broom"></i> Limpiar filtro </button></a>
        </div>


        <br><br>
        <div class="border-lines"></div>
        @if ($products->isEmpty())
        <div><h3>No hay Subastas</h3></div>
         @else


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
                                    <h2 class="card-text text-uppercase"><strong>{{$product->marca}}</strong></h2>
                                    <p class="card-text "><strong>${{ $product->ofertas()->max('oferta') }}__ GOI Mejor oferta al momento </strong></p>
                                    <p class="card-text">(81 ofertas de subasta)</p>
                                    <p class="text-success font-weight-bold" style="color: chartreuse">Envio gratis</p>
                                </div>

                                <div class="row">
                                    <div class="col tam">
                                        <p class="card-text"><strong>Finalizacion de la subasta:</strong> {{$product->fechaFinal}}</p>
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
                {{-- {{ $products->links() }} --}}
            </table>
            @endif
        </div>

    </div>
</div>

@endsection

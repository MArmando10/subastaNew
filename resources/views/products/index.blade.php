@extends('layouts.main')

@section('content')


<div class="row col-lg-6 justify-content-center" ><h1><strong> Estas en productos</strong></h1></div>


{{--
<div id="nav-seach">
    <div id="nav-bar-left"></div>
    <form accept-charset="utf-8" action="/s/ref=nb_sb_noss" class="nav-searchbar" method="get" name="site-search" role="search">
        <input type="hidden" name="__mk_es_MX" value="Categoria">
        <div class="nav-left">
            <div id="nav-search-dropdown-card">
                <div class="nav-search-scope nav-prite">
                    <div class="nav-search-facade" data-value="search-alias=aps">
                        <span class="nav-search-label" style="width: auto;">{{$categorias}}</span>
                    <i class="nav-icon"></i>
                    </div>
                    <span id="searchDropdownDescription" style="display: none">Seleccionar la categoria que deseas buscar</span>
                    <select aria-describedby="searchDropdownDescription" class="nav-search-dropdown searchSelect" data-nav-digest="sLIwIAYT1f4gYs2ewzSrEu0+QWE=" data-nav-selected="2" id="searchDropdownBox" name="url" style="display: block; top: 2.5px;" tabindex="0" title="Buscar en">
                        <option value="search"></option>
                    </select>
                </div>
            </div>
        </div>
    </form>
</div> --}}

{{-- {{dd($categorias)}} --}}
<div class="row-3" style="margin: 65px; padding: 30px">
    <div class="col-lg-6" style="min-width: 100%;">

        <div class="row justify-content-center" >
            <div class="form-group col-md-3 col-2">
                @if(!$anterior)
                <div class="nav-search-facade" data-value="search-alias=aps">
                    <span class="nav-search-label" style="width: auto;">{{$categoria}}</span>
                <i class="nav-icon"></i>
                </div>
                <input size="45" class="redondeado confondo form-control form-control-lg ml-2 w-40" name="categoria" type="search" placeholder="Buscar por Categoría" aria-label="Search">
            </div>
                @else
                <div class="form-group col-md-2">
                    <input type="search" class="form-control" name="categorias" placeholder="Buscar por Categoria" value="{{ (!$anterior['categories']) }}">
                    @foreach($categorias as $categoria)
                        <option value="{{ $id }}">{{$categorias->nombre}}</option>
                    @endforeach
                </div>
                @endif
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-search"></i> Buscar
                </button>
                <div class="form-group col-md-3">
                    <a href="{{route('product.index')}}"><button type="button" class="btn btn-default">
                        <i class="fas fa-broom" style="text-align: right"></i> Limpiar filtro </button>
                    </a>
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
                    @if ($product->imagenes->count() > 0)
                        @for ($i = 0; $i < 1; $i++) <img src="{{asset($product->imagenes[$i]->url)}}" alt="adasd.jpeg" width="150">
                        @endfor
                    @endif
                </div>
                <div class="col info letra tam">
                    <h2 class="card-text text-uppercase"><strong>{{$product->marca}}</strong></h2>
                    <p class="card-text id='maximo'">Mejor oferta al momento <strong>${{ $product->ofertas()->max('oferta') }}</strong></p>
                    <p class="card-text" id="maximo">({{count($product->ofertas)}} oferta/s de subasta)</p>
                    {{-- <p class="text-success font-weight-bold" style="color: chartreuse">Envio gratis</p> --}}
                </div>
                <div class="col tam">
                    <p class="card-text"><strong> Finalizacion de la subasta:</strong> {{$product->fechaFinal}}</p>
                    <p class="card-text"><strong> De: </strong> {{$product->direccion}}</p>
                    <p class="card-text">{{$product->Destino}}</p>
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



<script>
    function maximo(){
        var mayor = Math.max('maximo');
        document.write(mayor);
    }




    // function todas(){
    //     var todas =
    // }
</script>

@endsection

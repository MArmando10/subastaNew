@extends('layouts.main')

@section('content')

<style>
  body {
    /* background: #555; */
    /* background-color: transparent; */
    font-size: 1.2rem;
    background-color: white;
  }
  .content {
    max-width: 900px;
    margin: auto;
    /* background: white; */
    padding: 25px;
  }
  .border-lines {
        background-color: darkgrey;
        height: 4px;
        width: 100%;
    }
    .footer{
           background-color: dimgrey;
    }
</style>
{{-- {{$categorias}} --}}
<div class="card content"  style="border: double">
  <div class="card-header text-center" style="background-color: black; color: white">
    <h2 style="font-size: 3rem;">Subasta un producto</h2>
  </div>
  <div class="card-body" >

      {!! Form::open(['action' => 'ProductController@store', 'method' => 'post', 'files' => true], ['class' => 'inline-form']) !!}

        {{-- {{$errors}} --}}
      <div class="form-group col-12">
        <h3 class="font-weight-bold" style="font-size: 2rem">Detalles de producto</h3>

        <!-- Titulo -->
        <div class="form-group row">
          {{ Form::label('Titulo', null, ['class' => 'col-sm-2 col-form-label']) }}
          <div class="col-sm-10">
            {{ Form::text('titulo', '', array_merge(['class' => 'form-control'] )) }}
          </div>
        </div>
        <!-- Fotos -->
        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text" id="FormUpload">Fotos</span>
          </div>

          <div class="custom-file">
            {!! Form::file('images[]', array('id' => 'FormPhotos', 'aria-describedby' =>
            'FormUpload','multiple'=>true,'class'=>'custom-file-input')) !!}
            {{ Form::label('Archivos seleccionados', null, ['for'=> 'FormPhotos','class' => 'custom-file-label']) }}
          </div>
        </div>

        <!-- Categoria -->
        {{-- <div class="form-group row">
          {{ Form::label('Categoria', null, ['class' => 'col-sm-2 col-form-label']) }}
          <div class="col-sm-10">
            {{ Form::select('categoria_id', ['1' => 'Tecnología', '2' => 'Hogar', '3' => 'Deportes', '4' => 'Ropa', '5' => 'Juguetes', '6' => 'Otros' ], 'categoria', ['class' => 'form-control']) }}
          </div>
        </div> --}}

        <div class="form-group">
            <label for="categoria">Categoria</label>
                <select class="form-control" id="categoria" name="categoria" style="font-weight: bold">
                    <option value="">--> Seleccione <-- </p></option>
                    @foreach($categorias as $id => $categoria)
                        <option value="{{ $id }}">{{$categoria}}</option>
                    @endforeach
                </select>
                @error('categoria')
                <span class="invalid-feedback d-block" role="alert">
                <strong>{{$message}}</strong>
                </span>
                @enderror
        </div>


        <!-- Condicion -->
        <div class="form-group row">
          {{ Form::label('Condición', null, ['class' => 'col-sm-2 col-form-label']) }}
          <div class="col-sm-10">
            {{ Form::select('condicion', ['1' => 'Nuevo', '2' => 'Usado'], 'condicion', ['class' => 'form-control']) }}
          </div>
        </div>

        <!-- Marca -->
        <div class="form-group row">
          {{ Form::label('Marca', null, ['class' => 'col-sm-2 col-form-label']) }}
          <div class="col-sm-10">
            {{ Form::text('marca', '', array_merge(['class' => 'form-control'] )) }}
          </div>
        </div>

        <!-- Descripcion -->
        <div class="form-group row">
          {{ Form::label('Descripción', null, ['class' => 'col-sm-3 col-form-label']) }}
          <div class="col-sm-12">
            {{ Form::textarea('descripcion', null, ['id' => 'keterangan', 'rows' => 4, 'class' => 'form-control']) }}
          </div>
        </div>
        <br>
        <div class="border-lines"></div>
       <br><br>
        <!--Duración-->
        <h3 class="font-weight-bold" style="font-size: 2rem">Detalles de la venta</h3>
        <div class="form-group row">
          {{ Form::label('Duración', null, ['class' => 'col-sm-2 col-form-label']) }}
          <div class="col-sm-10">
            {{ Form::select('duracion', ['1' => '1 Día', '2' => '2 Días', '3' => '3 Días', '4' => '7 Días', '5' => '15 Días'], 'duracion', ['class' => 'form-control']) }}
          </div>
        </div>

        <!-- Horario para comenzar -->
        <div class="form-group row">
          {{ Form::label('Inicio', null, ['class' => 'col-sm-2 col-form-label']) }}
          <div class="col-10">
            {{ Form::datetimeLocal('fechaInicio', \Carbon\Carbon::now(), ['id' => 'fechaInicio',  'class' => 'form-control']) }}
          </div>
        </div>
        <!-- fecha y hora final -->
        <div class="form-group row">
          {{ Form::label('final', null, ['class' => 'col-sm-2 col-form-label']) }}
          <div class="col-10">
            {{ Form::datetimeLocal('fechaFinal', \Carbon\Carbon::now(), ['id' => 'fechaFinal', 'class' => 'form-control']) }}
          </div>
        </div>
        <!-- Precio inicial -->
        <div class="form-group row">
          {{ Form::label('Precio inicial', null, ['class' => 'col-sm-2 col-form-label']) }}
          <div class="col-sm-10">
            <div class="input-group">
              {{ Form::text('precioInicial', '', ['aria-label'=> 'Dollar amount (with dot and two decimal places)', 'class' => 'form-control']) }}
              <div class="input-group-append">
                <span class="input-group-text">$</span>
              </div>
            </div>
          </div>
        </div>

        <!-- Precio reserva -->
        <div class="form-group row">
          {{ Form::label('Precio reserva', null, ['class' => 'col-sm-2 col-form-label']) }}
          <div class="col-sm-10">
            <div class="input-group">
              {{ Form::text('precioReserva', '', ['aria-label'=> 'Dollar amount (with dot and two decimal places)', 'class' => 'form-control']) }}
              <div class="input-group-append">
                <span class="input-group-text">$</span>
              </div>
            </div>
          </div>
        </div>

        <!-- cantidad -->
        <div class="form-group row">
          {{ Form::label('Cantidad', null, ['class' => 'col-sm-2 col-form-label']) }}
          <div class="col-sm-10">
            {{ Form::number('cantidad', '', ['class' => 'form-control']) }}
          </div>
        </div>
        <br>
        <div class="border-lines"></div>
        <br><br>
        {{-- <h3 class="font-weight-bold">Opciones de devolución</h3>
        <!-- Devolucion -->
        <div class="form-group row" style="padding: 0rem 1rem;">
            <div class="custom-control custom-switch">
              {{ Form::checkbox('refund', 'value', false, ['class' => 'custom-control-input', 'id' => 'refundSwitch' ]) }}
               {{ Form::label('refundSwitch', null, ['class' => 'custom-control-label']) }}
            </div>
      </div> --}}
  <!-- Detalles de envio -->
  <h3 class="font-weight-bold" style="font-size: 2rem">Detalles de envío</h3>

  <!-- Destino -->
  <div class="form-group row">
    {{ Form::label('Destino', null, ['class' => 'col-sm-2 col-form-label']) }}
    <div class="col-sm-10">
      {{ Form::select('Destino', ['1' => 'Nacional', '2' => 'Internacional'], 'condition_id', ['class' => 'form-control']) }}
    </div>
  </div>
<br>
  <!-- dimensiones del producto -->
  <!-- dimensiones de alto -->
  <h2><strong>Peso y dimensiones del paquete</strong></h2>
  <div class="form-group row">
    <div class="col-sm-6">
      {{ Form::label('Alto',null,['class'=>'row justify-content-between col-form-label']) }}
      {{ Form::number('Alto', '', ['class' => 'form-control']) }}
      {{ Form::select('Alto', ['1' => 'cm', '2' => 'mm', '3' => 'm'], 'Alto', ['class' => 'form-control']) }}
    </div>
    <!-- dimensiones de ancho -->
    <div class="col-sm-6">
      {{ Form::label('Ancho',null,['class'=>'row justify-content-between col-form-label']) }}
      {{ Form::number('Ancho', '', ['class' => 'form-control']) }}
      {{ Form::select('Ancho', ['1' => 'cm', '2' => 'mm', '3' => 'm'], 'Ancho', ['class' => 'form-control']) }}
    </div>
  </div>

  <!-- dimensiones de largo -->
  <div class="form-group row">
    <div class="col-sm-6">
      {{ Form::label('Largo',null,['class'=>'row justify-content-between col-form-label']) }}
      {{ Form::number('Largo', '', ['class' => 'form-control']) }}
      {{ Form::select('Largo', ['1' => 'cm', '2' => 'mm', '3' => 'm'], 'Largo', ['class' => 'form-control']) }}
    </div>
  <!-- Peso del producto -->
    <div class="col-sm-6">
      {{ Form::label('Peso',null,['class'=>'row justify-content-between col-form-label']) }}
      {{ Form::number('Peso', '', ['class' => 'form-control']) }}
      {{ Form::select('Peso', ['1' => 'kg', '2' => 'mg', '3' => 'g'], 'Peso', ['class' => 'form-control']) }}
    </div>
  </div>
<br><br>
  <!-- ubicacion del articulo -->
  <div class="form-group row" style="justify-content: center">
    <fieldset class="border p-3 mb-4">
        <legend class="text-primary">Ubicación</legend>

        <div class="form-group">
            <label for="formbuscador">Coloca la dirección donde se encuentra el producto</label>
            <input type="text" id="formbuscador" class="form-control" placeholder="Calle del Establecimiento">

            <p class="text-secondary mt-5 mb-3 text-center">El asistente colocará una direccion estimada, mueve el Pin hacia el lugar correcto</p>
        </div>
    </fieldset>


    <div class="col-sm-8" style="background: silver">
        <br>
        <div class="form-group">
            <div id="mapa" style="height: 400px" style="color: black; ">mapa</div>
        </div>

        <p class="informacion">Confirma que los campos son correctos</p>

        <div class="form-group">
            <label for="direccion">Dirección</label>

            <input type="text" id="direccion" class="form-control @error('direccion') is-invalid @enderror" placeholder="Dirección" value="{{old('direccion')}}">
            {{-- <div class="invalid-feedback">
                {{$message}}
            </div> --}}
        </div>

        <div class="form-group">
            <label for="colonia">Colonía</label>

            <input type="text" id="colonia" class="form-control @error('colonia') is-invalid @enderror" placeholder="Colonía" value="{{old('colonia')}}">
            {{-- <div class="invalid-feedback">
                {{$message}}
            </div> --}}
        </div>
        <input type="hidden" id="lat" name="lat" value="{{old('lat')}}">
        <input type="hidden" id="lng" name="lng" value="{{old('lng')}}">
        <br>
    </div>

</div>
<div class="row footer justify-content-center  ">
    <h5 style="text-shadow: -1px -1px white, 1px 1px #333">Los gastos de envío serán cargados a tu cuenta</h5>
</div>

</div>
</div>
    <div class="d-flex justify-content-between mb-8">
      <a class="btn btn-primary" role="button" href="{{route('product.index')}}"><i class="fas fa-arrow-left"></i> Regresar</a>
        {{Form::submit('Guardar y continuar', ['class' => 'btn btn-primary fas fa-save'])}}

    {!! Form::close() !!}
    </div>

  </div>
  <br>






  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ==" crossorigin=""/>

  <link rel="stylesheet" href="https://unpkg.com/esri-leaflet-geocoder/dist/esri-leaflet-geocoder.css">
  <link rel="stylesheet" href="https://unpkg.com/leaflet-geosearch@3.0.0/dist/geosearch.css"/>



<script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"
  integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew=="
  crossorigin=""></script>
  <script src="https://unpkg.com/esri-leaflet"></script>
  <script src="https://unpkg.com/esri-leaflet-geocoder"></script>


  <script>

    //   import { OpenStreetMapProvider } from 'leaflet-geosearch';
    //   const provider = new OpenStreetMapProvider();

       document.addEventListener('DOMContentLoaded', () => {
           if(document.querySelector('#mapa')){
               const lat = 20.6705778;
               const lng = -103.4358731;
               const mapa = L.map('mapa').setView([lat, lng], 16);

               L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                   attribution: '&copy; <a href=" https://www.openstreetmap.org/org/copyringht">OpenStreetMap</a> contributors'
                }).addTo(mapa);
                let marker;
                // agregar el pin
                marker = new L.marker([lat, lng],{
                    draggable: true,
                    autoPan: true

                }).addTo(mapa);

                //Geocode service
                const geocodeService = L.esri.Geocoding.geocodeService();

                //buscador de direcciones
                const buscador = document.querySelector('#formbuscador');
                buscador.addEventListener('input', buscarDireccion);

                //Detectar movimiento del market
                marker.on('moveend', function(e){
                    marker = e.target;

                    const posicion = marker.getLatLng();
                    // console.log(marker.getLatLng())

                    //centrar automaticamente
                    mapa.panTo( new L.LatLng( posicion.lat, posicion.lng ) );

                    //Reverse Geocoding, cuando el usuario reubica el pin
                    geocodeService.reverse().latlng(posicion, 16).run(function(error, resultado){
                        // console.log(error);

                        // console.log(resultado.address);

                        marker.bindPopup(resultado.address.LongLabel);
                        marker.openPopup();

                        //llenar los campos
                        llenarInputs(resultado);
                    })
                });

                // function buscarDireccion(e) {

                //     if(e.target.value.length > 1) {
                //         provider.search({query: e.target.value})
                //         .then( resultado => {
                //             console.log(resultado[0].bounds[0]);
                //         })
                //     }

                // }

                function llenarInputs(resultado) {
                     console.log(resultado);
                    document.querySelector('#direccion').value = resultado.address.Address || '';
                    document.querySelector('#colonia').value = resultado.address.Neighborhood || '';
                    document.querySelector('#lat').value = resultado.latlng.lat || '';
                    document.querySelector('#lng').value = resultado.latlng.lng || '';

                }
            }
        });
  </script>




@endsection

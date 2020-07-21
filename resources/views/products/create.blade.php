@extends('layouts.main')

@section('content')

<style>
  body {
    background: #555;
  }
  
  .content {
    max-width: 500px;
    margin: auto;
    /* background: white; */
    padding: 10px;
  }
  </style>

<div class="card content">
  <div class="card-header">
    <h2>Subasta un producto</h2>
  </div>
  <div class="card-body">
    <form class="PRODUCT" method="POST" action="{{route('product.store')}}">

      @csrf
      {{$errors}}

      <div class="form-group col-md-12">
        <h3>Detalles de producto</h3>
        {{-- <div class="form-row"> --}}
          <div class="form-group col-lg-12 col-3">
            <label for="txtTitulo">Título</label>
            <input type="text" id="txtTitulo" class="form-control" value="{{old('Titulo')}}" name="Titulo"
              placeholder="Ingresa título" required onKeyPress="return soloLetras(event)" onkeyup="soloLetras(this);">
            <p class="inputError">{{ $errors->first('Titulo') }}</p>
          </div>

          {{-- <div class="form-group col-md-3">
            <label for="txtApellidoP">Primer Apellido</label>
            <input type="text" id="txtApellidoP" class="form-control" value="{{old('ApellidoP')}}" name="ApellidoP"
              placeholder="Ingresa el primer apellido" required onKeyPress="return soloLetras(event)"
              onkeyup="soloLetras(this);">
            <p class="inputError">{{ $errors->first('ApellidoP') }}</p>
          </div>

          <div class="form-group col-md-3">
            <label for="txtApellidoM">Segundo Apellido</label>
            <input type="text" id="txtApellidoM" class="form-control" value="{{old('ApellidoM')}}" name="ApellidoM"
              placeholder="Ingresa el segundo apellido" required onKeyPress="return soloLetras(event)"
              onkeyup="soloLetras(this);">
            <p class="inputError">{{ $errors->first('ApellidoM') }}</p>
          </div>

          <div class="form-group col-md-3">
            <label for="txtDomi">Domicilio</label>
            <input type="text" id="txtDomi" class="form-control" value="{{old('Domi')}}" name="Domi"
              placeholder="Ingresa el Domicilio" required onKeyPress="return soloLetras(event)"
              onkeyup="soloLetras(this);">
            <p class="inputError">{{ $errors->first('Domi') }}</p>
          </div>

          <div class="form-group col-md-3">
            <label for="txtMunicipio">Municipio</label>
            <input type="text" id="txtMunicipio" class="form-control" value="{{old('Municipio')}}" name="Municipio"
              placeholder="Ingresa el Municipio" required onKeyPress="return soloLetras(event)"
              onkeyup="soloLetras(this);">
            <p class="inputError">{{ $errors->first('Municipio') }}</p>
          </div>

          <div class="form-group col-md-3">
            <label for="txtEsttado">Estado</label>
            <input type="text" id="txtEsttado" class="form-control" value="{{old('Estado')}}" name="Estado"
              placeholder="Ingresa el Estado" required onKeyPress="return soloLetras(event)"
              onkeyup="soloLetras(this);">
            <p class="inputError">{{ $errors->first('Estado') }}</p>
          </div>

          <div class="form-group col-md-3">
            <label for="txtTelefono">Telefono</label>
            <input type="text" id="txtTelefono" class="form-control" value="{{old('Telefono')}}" name="Telefono"
              placeholder="Ingresa el Telefono" required onKeyPress="return soloNumeros(event)"
              onkeyup="soloNumeros(this);">
            <p class="inputError">{{ $errors->first('Telefono') }}</p>
          </div> --}}

        </div>
      </div>

  </div>

  {{-- <div class="d-flex justify-content-between mb-8">
      <a class="btn btn-primary" role="button"><i class="fas fa-arrow-left"></i> Regresar</a>
  
  
    <button type="submit" class="btn btn-primary"><i class="fas fa-save" id="btnComprobar"
        href="{{route('product.index')}}"></i> Guardar y continuar</button>
  </div> --}}
</div>
<br>
</form>

@endsection
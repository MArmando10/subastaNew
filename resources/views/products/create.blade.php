@extends('layouts.main')

@section('content')

<div class="container">
   {{-- <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
       <li class="breadcrumb-item"><a href="">Inicio</a></li>
       <li class="breadcrumb-item"><a href="{{route('product.index')}}">Subasta GOI</a></li>
      <li class="breadcrumb-item active" aria-current="page">Creación de subasta</li>
    </ol>
  </nav> --}}

    <div class="row justify-content-center">
        <div class="col-md-8">
            
            <div class="card">
            
              <div class="card-header">Subastar un producto {{ $now = \Carbon\Carbon::now() }}</div>
                {{ $now->addDay(2) }}
            
                <div class="card-body">

                  {!! Form::open(['action' => 'ProductController@store', 'method' => 'post', 'files' => true], ['class' => 'inline-form']) !!}
                  <div><h5>Detalles del producto</h5></div>
                  {{$errors}}
                  
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
                      {!! Form::file('images[]', array('id' => 'FormPhotos', 'aria-describedby' => 'FormUpload','multiple'=>true,'class'=>'custom-file-input')) !!}
                      {{ Form::label('Archivos seleccionados', null, ['for'=> 'FormPhotos','class' => 'custom-file-label']) }}
                    </div>
                  </div>

                  <!-- Categoria -->
                  <div class="form-group row">
                    {{ Form::label('Categoria', null, ['class' => 'col-sm-2 col-form-label']) }}
                    <div class="col-sm-10">
                      {{ Form::select('categoria', ['1' => 'Large', '2' => 'Small'], 'categoria', ['class' => 'form-control']) }}
                    </div>
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
                    {{ Form::label('Descripción', null, ['class' => 'col-sm-2 col-form-label']) }}
                    <div class="col-sm-10">
                      {{ Form::textarea('descripcion', null, ['id' => 'keterangan', 'rows' => 4, 'class' => 'form-control']) }}
                    </div>
                  </div>

                  <div><h5>Detalles de venta</h5></div>
                  <!-- Duracion -->
                  <div class="form-group row">
                    {{ Form::label('Duración', null, ['class' => 'col-sm-2 col-form-label']) }}
                    <div class="col-sm-10">
                      {{ Form::select('duracion', ['1' => '1 Día', '2' => '2 Días'], 'duracion', ['class' => 'form-control']) }}
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

                  <div><h5>Detalles de devolución</h5></div>
                  <!-- Devolucion -->
                  {{-- <div class="form-group row" style="padding: 0rem 1rem;">
                    <div class="custom-control custom-switch">
                      {{ Form::checkbox('refund', 'value', false, ['class' => 'custom-control-input', 'id' => 'refundSwitch' ]) }}
                      {{ Form::label('refundSwitch', null, ['class' => 'custom-control-label']) }}
                    </div>
                  </div> --}}
                    <!-- Detalles de envio -->

                  <h5>Detalles de envío</h5>
                   <!-- Destino -->
                  <div class="form-group row">
                  {{ Form::label('Destino', null, ['class' => 'col-sm-2 col-form-label']) }}
                  <div class="col-sm-10">
                      {{ Form::select('Destino', ['1' => 'Nacional', '2' => 'Internacional'], 'condition_id', ['class' => 'form-control']) }}
                  </div></div>

                    <!-- dimensiones del producto -->
                     <!-- dimensiones de alto -->
                  <div class="form-group row">
                    {{ Form::label('Alto',null,['class'=>'col-sm-2 col-form-label']) }}
                    <div class="col-sm-2">
                       {{ Form::number('Alto', '', ['class' => 'form-control']) }}
                       {{ Form::select('Alto', ['1' => 'cm', '2' => 'mm', '3' => 'm'], 'Alto', ['class' => 'form-control']) }}
                    </div>   
                  <!-- dimensiones de ancho -->       
                  {{ Form::label('Ancho',null,['class'=>'col-sm-4 col-form-label']) }}
                    <div class="col-sm-2">
                       {{ Form::number('Ancho', '', ['class' => 'form-control']) }}
                       {{ Form::select('Ancho', ['1' => 'cm', '2' => 'mm', '3' => 'm'], 'Ancho', ['class' => 'form-control']) }}
                    </div>
                  </div>
                   <!-- dimensiones de largo -->
                  <div class="form-group row">               
                    {{ Form::label('Largo',null,['class'=>'col-sm-4 col-form-label']) }}
                    <div class="col-sm-4">
                       {{ Form::number('Largo', '', ['class' => 'form-control']) }}
                       {{ Form::select('Largo', ['1' => 'cm', '2' => 'mm', '3' => 'm'], 'Largo', ['class' => 'form-control']) }}
                    </div>   
                  </div>

                    <!-- Peso del producto -->
                  <div class="form-group row">               
                    {{ Form::label('Peso',null,['class'=>'col-sm-4 col-form-label']) }}
                    <div class="col-sm-4">
                       {{ Form::number('Peso', '', ['class' => 'form-control']) }}
                       {{ Form::select('Peso', ['1' => 'kg', '2' => 'mg', '3' => 'g'], 'Peso', ['class' => 'form-control']) }}
                    </div> 
                </div>

                  <!-- ubicacion del articulo -->
                <div class="form-group row">
                    {{ Form::label('Ubicacion del artículo', null, ['class' => 'col-sm-2 col-form-label']) }}
                    <div class="col-sm-8">
                      <div class="input-group">
                        {{ Form::text('geografi', '', ['aria-label'=> 'Dollar amount (with dot and two decimal places)', 'class' => 'form-control']) }}
                      </div>  <!-- boton cambiar ubicacion -->
                  <button type="button" class="btn btn-light">Cambiar</button>
                    </div>
                  </div>
                  
                   <!-- boton guardar formulario -->
                  <div>
                    <div class="d-flex justify-content-between mb-8">
                      {{Form::submit('Continuar!', ['class' => 'fas fa-save'])}}
                    </div>
                  </div>

                 {{--   <button type="submit" class="btn btn-primary"><i class="fas fa-save" id="btnComprobar"></i> Regresar</button></label> --}}
                 
                 {{-- <div> <label><button type="submit" class="btn btn-primary"><i class="fas fa-save" id="btnComprobar"></i> Guardar y continuar</button></label> --}}
                

                  {!! Form::close() !!}
              </div>
            </div>
          </div>
        </div>            
  </div>
@endsection
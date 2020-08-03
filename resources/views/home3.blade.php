@extends('layouts.main')

@section('body-config')

@section('content')
<style>
    .tama{
        height: 30px;
        width: 30px;
    }
</style>


    <form class=" form-inline d-flex justify-content-center md-form form-sm mt-0" style="border-radius: 80px; ">
        <i class="fas fa-search" aria-hidden="true"></i>
        <input size="45" class="tama redondeado confondo form-control form-control-lg ml-2 w-40" name="buscarpor" type="search" placeholder="Buscar por Categoría" aria-label="Search">
        <button class="btn btn-dark tama form-control-lg btn-rounded btn-sm my-0" type="submit" style="margin: 10px; width: 95px;;"> Buscar</button>
    </form>
    <br>

    <div class="row" >
        <div class="col-lg-12 col-6 bg-secondary" style="color: dimgrey; width: 20%; height: auto;">
          <h2 style="color: black">Mejores Precios</h2>
          <br>
            <div class="col-lg-3 bg-ter ">
                    <img class="d-block w-100  bord" src="storage/moto.jpeg" alt="First slide" style="width: 60%; height: auto;" >
            </div>
            <div class="col-lg-3 bg-ter offset-md-1">
                    <img class="d-block w-100  bord" src="storage/auto.jpeg" alt="First slide" style="width: 60%; height: auto;" >
            </div>
            <div class="col-lg-3 bg-ter offset-md-1">
                    <img class="d-block w-100  bord" src="storage/auto_paisaje.jpeg" alt="First slide" style="width: 60%; height: auto;" >
            </div>
        </div>
    </div>
    <br><br><br>

    <div class="row-2" style=" padding: $spacer !important; margin: 50px; justify-content: center">
        <div class="col-md-6 bg-secondary" style="color: dimgrey; width: 30%; height: auto;">
            <h2 style="color: black;">Explora lo mejor en hogar y cocina</h2>
            <br>
            <div class="col-lg-12">
                <img class="d-block  offset-md-1  bord" src="storage/sillas.jpg" alt="First slide" style="width: 50%; height: auto;" >
                <br>
            </div>
            <div class="col-12">
                <img class="d-block bg-ter offset-md-1 bord" src="storage/lampara.jpg" alt="First slide" style="width: 50%; height: auto;" >
            </div>
        </div>
        <div class="col-md-6 bg-secondary" style="color: dimgrey; width: 30%; height: auto;">
            <h2 style="color: black;">Lo mejor en deportes</h2>
            <br>
            <div class="col-lg-8 ">
                <img class="d-block   bord" src="storage/deportiva.jpg" alt="First slide" style="width: 60%; height: auto;" >
            </div>
            <div class="col-lg-4  ">
                <div class="col-12 bg-ter ">
                    <img class=" bord" src="storage/pelotaas.jpg" alt="First slide" style="width: 90px; height: 50px;" >
                    <br>
                </div>
            </div>
            <div class="col-lg-4">
                <br>
                <img class="d-block bg-ter   bord" src="storage/gorra_deportiva.jpg" alt="First slide" style="width: 50%; height: auto;" >
            </div>
        </div>
    </div>



















    {{-- <a class="btn btn-secondary mb-5" href="{{ route('product.create') }}">Agregar producto</a> --}}
{{-- <div class="background" style="position: relative">
  <div class="container">
    <div class="row-2 justify-content-center tam">
      {{--
            2   I want to make a button that links to route: normindex
            This blow does not seem to work.

      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
       <ol class="carousel-indicators">
                  <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="d-block w-100" src="storage/auto.jpeg" alt="First slide">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="storage/auto_paisaje.jpeg" alt="Second slide">
          </div>
        </div>

        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>

      </div>
      <!-- Custom Controls -->
     <a href="javascript:void(0);" id="prevBtn">Prev Slide</a>
            <a href="javascript:void(0);" id="nextBtn">Next Slide</a>

    </div>
  </div>

</div> --}}




<script type="text/javascript">
  // Call carousel manually
    $('#myCarouselCustom').carousel();

    // Go to the previous item
    $("#prevBtn").click(function(){
        $("#myCarouselCustom").carousel("prev");
    });
    // Go to the previous item
    $("#nextBtn").click(function(){
        $("#myCarouselCustom").carousel("next");
    });

</script>
@endsection

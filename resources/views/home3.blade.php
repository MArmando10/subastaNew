@extends('layouts.main')

@section('body-config')

@section('content')

<style>
    .bg-secondary {
  border-radius: 10px;
  margin: 20px;
  padding: 7%;
}
    .bg-ter{
    border-radius: 10px;
    padding: 9%;
    background-color: white;
    }
    .bord{
        border-radius: 25px;
    }
</style>



{{-- <a class="btn btn-secondary mb-5" href="{{ route('product.create') }}">Agregar producto</a> --}}
<div class="background" style="position: relative">
  <div class="container">
    <div class="row-2 justify-content-center tam">
      {{--
            2   I want to make a button that links to route: normindex
            This blow does not seem to work. --}}

      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        {{-- <ol class="carousel-indicators">
                  <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol> --}}
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
      {{-- <a href="javascript:void(0);" id="prevBtn">Prev Slide</a>
            <a href="javascript:void(0);" id="nextBtn">Next Slide</a> --}}

    </div>
  </div>

</div>

    <div class="row" style=" margin: auto; padding: 7%;  background-image: white; justify-content: center">
        <div class="col-lg-8 bg-secondary" style="color: dimgrey; margin: 10px; width: 70%; height: auto;">
            <div class="col-lg-3 bg-ter ">
                {{-- <div class="col-lg-3 rounded float-left "> --}}
                    <img class="d-block w-100  bord" src="storage/moto.jpeg" alt="First slide" style="width: 60%; height: auto;" >
                {{-- </div> --}}
            </div>
            <div class="col-lg-3 bg-ter offset-md-1">

                    <img class="d-block w-100  bord" src="storage/auto.jpeg" alt="First slide" style="width: 60%; height: auto;" >

            </div>
            <div class="col-lg-3 bg-ter offset-md-1">

                    <img class="d-block w-100  bord" src="storage/auto_paisaje.jpeg" alt="First slide" style="width: 60%; height: auto;" >

            </div>
        </div>
    </div>
    <div class="row" style="  background-color: white; justify-content: center">
        <div class="col-lg-8 bg-secondary" style="color: dimgrey; margin: 10px; width: 70%; height: auto;">
            <div class="col-lg-3 bg-ter ">
                {{-- <div class="col-lg-3 rounded float-left "> --}}
                    <img class="d-block w-100  bord" src="storage/moto.jpeg" alt="First slide" style="width: 60%; height: auto;" >
                {{-- </div> --}}
            </div>
            <div class="col-lg-3 bg-ter offset-md-1">

                    <img class="d-block w-100  bord" src="storage/auto.jpeg" alt="First slide" style="width: 60%; height: auto;" >

            </div>
            <div class="col-lg-3 bg-ter offset-md-1">

                    <img class="d-block w-100  bord" src="storage/auto_paisaje.jpeg" alt="First slide" style="width: 60%; height: auto;" >

            </div>
        </div>
    </div>





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

@extends('layouts.app')

@section('page-title')
Red dot
@endsection

@section('content')

<div class="row">
    <!--<div class="col-lg-12" style="position: relative; height: 60vh; overflow: hidden; background-image: url({{ asset('img/moment2.jpg') }}); background-size: cover; background-position: -330px 0; background-repeat: no-repeat;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
    ">

    <div style="width: 150px; height: 40px; background-color: #fff; border: 3px solid lightgrey; opacity: 0.7; position: absolute; top: 60%; left: 50%; transform: translate(-50%, -50%); text-align: center;">
        <a href="{{ route('products') }}" style="text-decoration: none; color: #000; line-height: 35px">Nuovi Arrivi</a>
    </div>-->
   
   <!-- <img class="active" src="{{ asset('img/moment2.jpg') }}" alt="" style="width: 200%; height: 100%; margin-top: -100px; margin-left: -250px"> 
        <div class="col-lg-4" style="height: 200px; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -70%);">
            <img src="{{ asset('img/off-w1.png') }}" alt="" style="width: 300px; height: 200px; position: absolute; bottom: 0px; left: 50%; transform: translate(-55%, 0%);"> 
        </div> -->
    </div>

    <div class="col-lg-12" style="margin-top: 0px; position: relative; overflow: hidden">
        <img id="uno" class="image active first" src="{{ asset('img/copertina.jpg') }}" alt="" style="width: 100%; height: 300px;">
        <img id="due" class="image" src="{{ asset('img/model1Street.png') }}" alt="" style="width: 100%; height: 300px;">
        <img id="tre" class="image last" src="{{ asset('img/model2Skater.jpg') }}" alt="" style="width: 100%; height: 300px;">
        <img id="quattro" class="image last" src="{{ asset('img/model5Street.png') }}" alt="" style="width: 100%; height: 300px;">
        <img id="quattro" class="image last" src="{{ asset('img/model1Petrol.jpg') }}" alt="" style="width: 100%; height: 300px;">
        <!--<img id="cinque" class="image last" src="{{ asset('img/model1Sea.png') }}" alt="" style="width: 100%; height: 300px;">-->
        <!--<div style="width: 150px; height: 40px; background-color: #fff; border: 3px solid lightgrey; opacity: 0.7; position: absolute; top: 30%; left: 50%; transform: translate(-50%, -50%); text-align: center;">
        <a href="{{ route('products') }}" style="text-decoration: none; color: #000; line-height: 35px">Nuovi Arrivi</a>
        </div>-->
    </div>

    <div class="col-lg-12" style="margin-top: 30px">
        <div class="col-lg-12" style="height: 100px; margin-bottom: 10px; border-radius: 2px; box-shadow: 4px 1px 10px lightgrey; background-color: #fff">
            <a href="{{ route('products') }}" style="text-decoration: none; color: #000">
                <div style="width: 40%; height: 100%; float: left; position: relative">
                    <div style="width: 150px; height: 100px; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%)">
                        <img class="active" src="{{ asset('img/j1.jpg') }}" alt="" style="width: 100%; height: 100%">
                    </div>
                </div>
                <div style="width: 60%; height: 100%; float: left; text-align: left; padding: 20px; line-height: 45px; font-size: 20px">
                    Scarpe
                </div>
            </a>
        </div>
        <div class="col-lg-12" style="height: 100px; border-radius: 2px; box-shadow: 4px 1px 10px lightgrey; background-color: #fff">
            <a href="{{ route('products') }}" style="text-decoration: none; color: #000">
                <div style="width: 40%; height: 100%; float: left; position: relative">
                    <div style="width: 100px; height: 100px; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%)">
                        <img class="active" src="{{ asset('img/palace2.jpg') }}" alt="" style="width: 100%; height: 100%">
                    </div>
                </div>
                <div style="width: 60%; height: 100%; float: left; text-align: left; padding: 20px; line-height: 45px; font-size: 20px">
                    <a href="{{ route('tees') }}" style="text-decoration: none; color: #000">Abbigliamento</a>    
                </div>
            </a>
        </div>
        <div class="col-lg-12" style="height: 100px; margin-bottom: 10px; border-radius: 2px; box-shadow: 4px 1px 10px lightgrey; background-color: #fff">
            <a href="{{ route('products') }}" style="text-decoration: none; color: #000">
                <div style="width: 40%; height: 100%; float: left; position: relative;">
                    <div style="width: 100px; height: 100px; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
                        <img class="active" src="{{ asset('img/k1.jpg') }}" alt="" style="width: 110%; height: 100%">
                    </div>
                </div>
                <div style="width: 60%; height: 100%; float: left; text-align: left; padding: 20px; line-height: 45px; font-size: 20px">
                    Accessori
                </div>
            </a>
        </div>
    </div>

    <!-- Modello 
    <div class="col-lg-12" style="position: relative; height: 60vh; overflow: hidden; margin-top: 30px; background-image: url({{ asset('img/modello1.png') }}); background-size: cover; background-repeat: no-repeat;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
    ">
        <div style="width: 150px; height: 40px; background-color: #fff; border: 3px solid darkgrey; opacity: 0.7; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); text-align: center;">
            <a href="{{ route('products') }}" style="text-decoration: none; color: #333333; line-height: 35px; font-weight: bold">NUOVI ARRIVI</a>
        </div>

    </div>-->

    <!-- Foto Skater -->
    <div class="col-lg-12" style="position: relative; height: 60vh; overflow: hidden; margin-top: 30px; background-image: url({{ asset('img/copertina2.jpg') }}); background-size: cover; background-repeat: no-repeat;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
    "></div>

    <!--<div class="col-lg-12" style="height: 10px; border: 1px solid black; overfow: hidden;">
        <div style="height: 100%; width: 1000px; font-size: 6px; margin: 0">
            VOLCANO - VOLCANO - VOLCANO - VOLCANO - VOLCANO - VOLCANO - VOLCANO - VOLCANO - VOLCANO - VOLCANO - VOLCANO - VOLCANO - VOLCANO - VOLCANO - VOLCANO - VOLCANO 
        </div>
    </div>-->
    <!-- scroll items -->
    <div class="col-lg-12" style="height: 200px; border-top: 1px solid grey; border-bottom: 1px solid grey;overflow-x: scroll; overflow-y: hidden; -webkit-overflow-scrolling: touch; margin-top: 30px">
        <div style="width: 1000px; height: 200px;">
        @foreach($products as $product)
            <a href="products/{{$product['id']}}">
                <div style="width: 150px; height: 200px; display: inline-block; position: relative; margin: 0 2px;">
                    <img class="active" src="{{ 'https://img-space.fra1.digitaloceanspaces.com/img-space/uploads/images/'.$product->photo1 }}" alt="product-img" style="width: 100%; height: 150px">
                    <span style="color: #000; font-size: 12px; font-weight: bold" class="text-truncate">{{ $product->nome }}</span><br>
                    <span style="color: #000; font-size: 10px; font-weight: bold">{{ $product->amount }} €</span>
                    <!--<div style="display: none; position: absolute; top: 50%; left: 50%; transform: translate(-50%; -50%)">
                        <h6>{{ $product->nome }}</h6>
                    </div>-->
                </div>
            </a>
        @endforeach
        </div>
    </div>
    <!-- /scroll items -->

    <script type="text/javascript">
photoSlider();

var imgFirst = $(".first");
var imgLast = $(".last");

function cheangeMargin() {
let count = 300;
setInterval(function() {
      if (count == 0) {
        clearInterval();
      } else {
      count -= 1;
      count--;
      $(".image.active").css({marginLeft: count+"px"});
    }
}, 1);
}

function photoSlider() {

    let x = "a";
  setInterval(function() {
    if (x == "a") {
      // First si applica solo all'apertura della pagina, prima che inizi il loop
      $(".image").removeClass("active");
      $("#due").addClass("active");
    
      cheangeMargin();
      x = "b";

    } else if (x == "b") {
      $(".image").removeClass("active");
      $("#tre").addClass("active");
     
      cheangeMargin();
      x = "c";

    } else if (x == "c") {
      $(".image").removeClass("active");
      $("#quattro").addClass("active");

      cheangeMargin();
      x = "d";
    } else if (x == "d") {
      $(".image").removeClass("active");
      $("#uno").addClass("active");

      cheangeMargin();
      x = "a";
    } /* else if (x == "e") {
      $(".image").removeClass("active");
      $("#uno").addClass("active");

      cheangeMargin();
      x = "a";
    } */
  },7000);
}

    </script>



@endsection
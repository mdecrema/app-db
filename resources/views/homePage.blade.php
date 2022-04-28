@extends('layouts.app')

@section('page-title')
Red dot
@endsection

@section('content')

<div class="row"> 
  <!-- banner scritta -->
  <div class="banner-text" style="background-color: #BF4825">
    <marquee
  loop="-1"
  scrollamount="5"
  scrolldelay="0"
  direction="left"
  height="30"
  width="100%"
  align="right">
  - nuova collezione - VOLCANO.it - nuova collezione - VOLCANO.it - nuova collezione - VOLCANO.it - nuova collezione - VOLCANO.it - nuova collezione - VOLCANO.it -
  - nuova collezione - VOLCANO.it - nuova collezione - VOLCANO.it - nuova collezione - VOLCANO.it - nuova collezione - VOLCANO.it - nuova collezione - VOLCANO.it -
  - nuova collezione - VOLCANO.it - nuova collezione - VOLCANO.it - nuova collezione - VOLCANO.it - nuova collezione - VOLCANO.it - nuova collezione - VOLCANO.it -
  </marquee>
  </div>

  <div class="img-slider">
    <!-- Bootstrap Slider -->
    <div id="carouselExampleIndicators" class="carousel slide col-12" data-interval="7000" data-ride="carousel">
      <ol class="carousel-indicators" style="z-index: 5">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>

      </ol>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img class="d-block w-100" style="height: 100%" src="{{ asset('img/copertina.jpg') }}" alt="First slide">
        </div>
       <!-- <div class="carousel-item">
          <img class="d-block w-100" style="height: 100%" src="{{ asset('img/skirent.png') }}" alt="Second slide">
          <div style="width: 200px; height: 70px; line-height: 30px; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); color: #fff; text-align: center;">
            <h3 style="color: #FE0000; 
            font-size: 28px; 
            font-family: 'Righteous', cursive; 
            font-style: italic;">NOLEGGIO SCI</h3>
          </div>
        </div> -->
      <div class="carousel-item" style="position: relative">
        <img class="d-block w-100" style="height: 100%" src="{{ asset('img/model1Street.png') }}" alt="Third slide">
        <div style="width: 200px; height: 70px; line-height: 30px; position: absolute; top: 70%; left: 50%; transform: translate(-50%, -50%); color: #fff; text-align: center;">
          <div style="width: 150px; height: 30px; margin: auto; border: 1px solid #grey; background-color: #FF5733;">
            Show More <i class="fas fa-chevron-right" style="font-size: 12px; margin-left: 5px"></i>
          </div>
          <span style="text-shadow: 1px 1px 4px #333333">Scopri tutti i prodotti Donna</span>
        </div>
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" style="height: 100%" src="{{ asset('img/model2Skater.jpg') }}" alt="Fourth slide">
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" style="height: 100%" src="{{ asset('img/model5Street.png') }}" alt="Fifth slide">
        <div style="width: 200px; height: 70px; line-height: 30px; position: absolute; top: 70%; left: 50%; transform: translate(-50%, -50%); color: #fff; text-align: center;">
          <div style="width: 150px; height: 30px; margin: auto; border: 1px solid #grey; background-color: #C70039;">
            Show More <i class="fas fa-chevron-right" style="font-size: 12px; margin-left: 5px"></i>
          </div>
          <span style="text-shadow: 1px 1px 4px #333333">Scopri tutti i prodotti Uomo</span>
        </div>
      </div>
    </div>
    <!--<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>-->
  </div>

  <!--  -->
  <div class="col-lg-12" style="margin-top: 30px">
    <div class="col-lg-12" style="height: 100px; margin-bottom: 10px; border-radius: 2px; box-shadow: 4px 1px 10px lightgrey; background-color: #fff">
        <a href="{{ route('products') }}" style="text-decoration: none; color: #000">
            <div style="width: 40%; height: 100%; float: left; position: relative">
                <div style="width: 150px; height: 100px; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%)">
                    <img class="active" src="{{ asset('img/j1.jpg') }}" alt="" style="width: 100%; height: 100%">
                </div>
            </div>
            <div style="width: 60%; height: 100%; float: left; text-align: left; padding: 20px; line-height: 45px; font-size: 18px">
                Scarpe
            </div>
        </a>
    </div>
    <div class="col-lg-12" style="height: 100px; margin-bottom: 10px; border-radius: 2px; box-shadow: 4px 1px 10px lightgrey; background-color: #fff">
        <a href="{{ route('products') }}" style="text-decoration: none; color: #000">
            <div style="width: 40%; height: 100%; float: left; position: relative">
                <div style="width: 100px; height: 100px; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%)">
                    <img class="active" src="{{ asset('img/palace2.jpg') }}" alt="" style="width: 100%; height: 100%">
                </div>
            </div>
            <div style="width: 60%; height: 100%; float: left; text-align: left; padding: 20px; line-height: 45px; font-size: 18px">
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
            <div style="width: 60%; height: 100%; float: left; text-align: left; padding: 20px; line-height: 45px; font-size: 18px">
                Accessori
            </div>
        </a>
    </div>
  </div>

  <!-- Model tattoo -->
  <div class="col-lg-12" style="position: relative; height: 70vh; overflow: hidden; margin-top: 30px; background-image: url({{ asset('img/model2Tattoo.png') }}); background-size: cover; background-repeat: no-repeat;
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
  "></div>

   <!-- Foto Skater -->
   <div class="col-lg-12" style="position: relative; height: 70vh; overflow: hidden; margin-top: 30px; background-image: url({{ asset('img/copertina2.jpg') }}); background-size: cover; background-repeat: no-repeat;
   -webkit-background-size: cover;
   -moz-background-size: cover;
   -o-background-size: cover;
   background-size: cover;
   "></div>
  
       <!-- eme studios -->
      <div class="col-lg-12" style="position: relative; height: 70vh; overflow: hidden; margin-top: 30px; background-image: url({{ asset('img/tylerBlack.png') }}); background-size: cover; background-repeat: no-repeat;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;">
        {{-- <div id="animationDiv" style="width: 50%; height: 100%; position: absolute; top: 0px; left: 0; background-color: #BF4825; display: block;">

        </div> --}}
      </div>

      <!-- Modello Sacco a Pelo -->
      <div class="col-lg-12" style="position: relative; height: 60vh; overflow: hidden; margin-top: 30px;">
        <h4>VLKN</h4>
        <p>

        </p>
      </div>

    <!-- Foto new balance -->
    <div class="col-lg-12" style="position: relative; height: 70vh; overflow: hidden; margin-top: 30px; background-image: url({{ asset('img/nb-550.png') }}); background-size: cover; background-repeat: no-repeat;
      -webkit-background-size: cover;
      -moz-background-size: cover;
      -o-background-size: cover;
      background-size: cover;
      "></div>
      
       <!-- Vans -->
       <div class="col-lg-12" id="vansBox" style="position: relative; height: 70vh; overflow: hidden; margin-top: 30px;">
       <div id="vansBoxBgImg" style="width: 100%; height: 100%; position: absolute; top: 0; left: 0; display: block; background-image: url({{ asset('img/model1Bike.png') }}); background-size: cover; background-repeat: no-repeat;
        -webkit-background-size: cover;
       -moz-background-size: cover;
       -o-background-size: cover;
       background-size: cover;">
       </div> 
       <div id="vansBoxLogo" style="width: 50%; height: 20%; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); display: none; background-image: url({{ asset('img/logo-vans.jpg') }}); background-size: cover">

       </div>
     </div>

     <!-- Jeans carousel -->
     <div class="" style="position: relative; height: 70vh; overflow: hidden; margin: 30px 0;">
      <div style="width: 100%; height: 100%;">
        <img id="j1" class="jPhoto" src="{{ asset('img/jeans1.jpg') }}" alt="jeans" style="width: 100%; height: 100%">
        <img id="j2" class="jPhoto" src="{{ asset('img/jeans2.jpg') }}" alt="jeans" style="width: 100%; height: 100%; display: none">
        <img id="j3" class="jPhoto" src="{{ asset('img/jeans3.jpg') }}" alt="jeans" style="width: 100%; height: 100%; display: none">
        <img id="j4" class="jPhoto" src="{{ asset('img/jeans4.jpg') }}" alt="jeans" style="width: 100%; height: 100%; display: none">
        <img id="j5" class="jPhoto" src="{{ asset('img/jeans5.jpg') }}" alt="jeans" style="width: 100%; height: 100%; display: none">
        <img id="j6" class="jPhoto" src="{{ asset('img/jeans6.jpg') }}" alt="jeans" style="width: 100%; height: 100%; display: none">
        <img id="j7" class="jPhoto" src="{{ asset('img/jeans7.jpg') }}" alt="jeans" style="width: 100%; height: 100%; display: none">
      </div>
      <div id="leftArrow" style="width: 50px; height: 100px; line-height: 100px; position: absolute; top: 50%; left: 10%; transform: translate(-50%, -50%); display: none; text-align: left">
        <i class="fas fa-2x fa-chevron-left" style="color: darkgrey;"></i>
      </div>
      <div id="rightArrow" style="width: 50px; height: 100px; line-height: 100px; position: absolute; top: 50%; right: -5%; transform: translate(-50%, -50%); text-align: right">
        <i class="fas fa-2x fa-chevron-right" style="color: darkgrey;"></i>
      </div>
    </div>

      <!-- scroll items -->
      <div class="col-lg-12" style="height: 200px; border-top: 1px solid grey; border-bottom: 1px solid grey;overflow-x: scroll; overflow-y: hidden; -webkit-overflow-scrolling: touch;">
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
  
      <!-- Modello Stussy -->
      <div class="col-lg-12" style="position: relative; height: 60vh; overflow: hidden; margin-top: 30px; background-image: url({{ asset('img/model1Stussy.png') }}); background-size: cover; background-repeat: no-repeat;
      -webkit-background-size: cover;
      -moz-background-size: cover;
      -o-background-size: cover;
      background-size: cover;
      "></div>
  
      <!-- Palace Board -->
      <div class="col-lg-12" style="position: relative; height: 60vh; overflow: hidden; margin-top: 30px; background-image: url({{ asset('img/palaceBoard.jpg') }}); background-size: cover; background-repeat: no-repeat;
      -webkit-background-size: cover;
      -moz-background-size: cover;
      -o-background-size: cover;
      background-size: cover;
      "></div>
  
      <!-- Accordion - Prova --> 
      <div class="accordion" id="accordionExample" style="margin-top: 30px">
    <div class="card">
      <div class="card-header" id="headingOne">
        <h2 class="mb-0">
          <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
            'Prova' Item #1
          </button>
        </h2>
      </div>
  
      <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
        <div class="card-body">
          Some placeholder content for the first accordion panel. This panel is shown by default, thanks to the <code>.show</code> class.
        </div>
      </div>
    </div>
    <div class="card">
      <div class="card-header" id="headingTwo">
        <h2 class="mb-0">
          <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
            'Prova' Item #2
          </button>
        </h2>
      </div>
      <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
        <div class="card-body">
          Some placeholder content for the second accordion panel. This panel is hidden by default.
        </div>
      </div>
    </div>
    <div class="card">
      <div class="card-header" id="headingThree">
        <h2 class="mb-0">
          <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
            'Prova' Item #3
          </button>
        </h2>
      </div>
      <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
        <div class="card-body">
          And lastly, the placeholder content for the third and final accordion panel. This panel is hidden by default.
        </div>
      </div>
    </div>
  </div>
  
  
  <!-- Import the component 
  <script type="module" src="https://unpkg.com/@google/model-viewer/dist/model-viewer.min.js"></script>
  <model-viewer src="{{ asset('img/Bee.glb') }}" alt="A 3D model of an astronaut" ar ar-modes="webxr scene-viewer quick-look" environment-image="neutral" auto-rotate camera-controls></model-viewer>
  -->
    
  </div>
  

</div>

<script>
  var x = 0;
  window.addEventListener("scroll", (event) => {
    let scrollY = this.scrollY;
    console.log(scrollY);
    if (scrollY > 1350 && scrollY < 2050) {
      //vans box
      document.getElementById('vansBoxLogo').style.display='none';
      document.getElementById('vansBoxBgImg').style.filter='grayscale(0%)';
      // document.getElementById('vansBox').style.filter='blur(0px)';
      //stussy box
      if (x === 0) {
        animationForDiv();
      }
    } else if (scrollY >= 2940 && scrollY <= 3350) {
      //stussy box
      clearInterval();
      document.getElementById('animationDiv').style.left='0px';
      x = 0;
      //vans box
      document.getElementById('vansBoxLogo').style.display='block';
      document.getElementById('vansBoxBgImg').style.filter='grayscale(100%)';
      // document.getElementById('vansBox').style.filter='blur(2px)';
    } else {
      //vans box
      document.getElementById('vansBoxLogo').style.display='none';
      document.getElementById('vansBoxBgImg').style.filter='grayscale(0%)';
      // document.getElementById('vansBox').style.filter='blur(0px)';
      //stussy box
      clearInterval();
      document.getElementById('animationDiv').style.left='0px';
      x = 0;
    }
});

function animationForDiv() {
  x = 1;
  var div = document.getElementById('animationDiv');
  
  var i = 0;
  setInterval(() => {
    if (i === 250) {
      clearInterval();
    } else {
      i += 5;
      div.style.left = '-'+i+'px';
    }
  }, 25);
}

// Jeans box
var checkCarousel = 1;
document.getElementById('rightArrow').addEventListener('click', jeansCarouselRight);
document.getElementById('leftArrow').addEventListener('click', jeansCarouselLeft);

function jeansCarouselRight() {
  var jeansBoxes = document.querySelectorAll('.jPhoto');
  console.log(jeansBoxes);
  if (checkCarousel === 1) {
    for (let i = 0; i < jeansBoxes.length; i++) {
      jeansBoxes[i].style.display='none';
    }
    document.getElementById('j2').style.display='block';
    document.getElementById('leftArrow').style.display='block';
    checkCarousel = 2;
  } else if (checkCarousel === 2) {
    for (let i = 0; i < jeansBoxes.length; i++) {
      jeansBoxes[i].style.display='none';
    }
    document.getElementById('j3').style.display='block';
    checkCarousel = 3;
  } else if (checkCarousel === 3) {
    for (let i = 0; i < jeansBoxes.length; i++) {
      jeansBoxes[i].style.display='none';
    }
    document.getElementById('j4').style.display='block';
    checkCarousel = 4;
  } else if (checkCarousel === 4) {
    for (let i = 0; i < jeansBoxes.length; i++) {
      jeansBoxes[i].style.display='none';
    }
    document.getElementById('j5').style.display='block';
    checkCarousel = 5;
  } else if (checkCarousel === 5) {
    for (let i = 0; i < jeansBoxes.length; i++) {
      jeansBoxes[i].style.display='none';
    }
    document.getElementById('j6').style.display='block';
    checkCarousel = 6;
  } else if (checkCarousel === 6) {
    for (let i = 0; i < jeansBoxes.length; i++) {
      jeansBoxes[i].style.display='none';
    }
    document.getElementById('j7').style.display='block';
    document.getElementById('rightArrow').style.display='none';
    checkCarousel = 7;
  }
}

function jeansCarouselLeft() {
  var jeansBoxes = document.querySelectorAll('.jPhoto');
  console.log(jeansBoxes);
  if (checkCarousel === 2) {
    for (let i = 0; i < jeansBoxes.length; i++) {
      jeansBoxes[i].style.display='none';
    }
    document.getElementById('j1').style.display='block';
    document.getElementById('leftArrow').style.display='none';
    checkCarousel = 1;
  } else if (checkCarousel === 3) {
    for (let i = 0; i < jeansBoxes.length; i++) {
      jeansBoxes[i].style.display='none';
    }
    document.getElementById('j2').style.display='block';
    checkCarousel = 2;
  } else if (checkCarousel === 4) {
    for (let i = 0; i < jeansBoxes.length; i++) {
      jeansBoxes[i].style.display='none';
    }
    document.getElementById('j3').style.display='block';
    checkCarousel = 3;
  } else if (checkCarousel === 5) {
    for (let i = 0; i < jeansBoxes.length; i++) {
      jeansBoxes[i].style.display='none';
    }
    document.getElementById('j4').style.display='block';
    checkCarousel = 4;
  } else if (checkCarousel === 6) {
    for (let i = 0; i < jeansBoxes.length; i++) {
      jeansBoxes[i].style.display='none';
    }
    document.getElementById('j5').style.display='block';
    checkCarousel = 5;
  } else if (checkCarousel === 7) {
    for (let i = 0; i < jeansBoxes.length; i++) {
      jeansBoxes[i].style.display='none';
    }
    document.getElementById('j6').style.display='block';
    document.getElementById('rightArrow').style.display='block';
    checkCarousel = 6;
  }
}
</script>


@endsection
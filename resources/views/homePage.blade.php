@extends('layouts.app')

@section('page-title')
Red dot
@endsection

@section('content')

<div class="row"> 
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
      <div class="carousel-item" style="position: relative">
        <img class="d-block w-100" style="height: 100%" src="{{ asset('img/model1Street.png') }}" alt="Second slide">
        <div style="width: 200px; height: 70px; line-height: 30px; position: absolute; top: 70%; left: 50%; transform: translate(-50%, -50%); color: #fff; text-align: center;">
          <div style="width: 150px; height: 30px; margin: auto; border: 1px solid #grey; background-color: #FF5733;">
            Show More <i class="fas fa-chevron-right" style="font-size: 12px; margin-left: 5px"></i>
          </div>
          <span style="text-shadow: 1px 1px 4px #333333">Scopri tutti i prodotti Donna</span>
        </div>
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" style="height: 100%" src="{{ asset('img/model2Skater.jpg') }}" alt="Third slide">
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" style="height: 100%" src="{{ asset('img/model5Street.png') }}" alt="Fourth slide">
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
          <div class="col-lg-12" style="height: 100px; border-radius: 2px; box-shadow: 4px 1px 10px lightgrey; background-color: #fff">
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
  
      <!-- Modello Sacco a Pelo -->
      <div class="col-lg-12" style="position: relative; height: 60vh; overflow: hidden; margin-top: 30px; background-image: url({{ asset('img/model1Camping.jpg') }}); background-size: cover; background-repeat: no-repeat;
      -webkit-background-size: cover;
      -moz-background-size: cover;
      -o-background-size: cover;
      background-size: cover;
      "></div>
  
      <!-- Pantaloni Carhartt -->
      <div class="col-lg-12" style="position: relative; height: 60vh; overflow: hidden; margin-top: 30px; background-image: url({{ asset('img/chararttPants.png') }});background-size: cover; background-repeat: no-repeat;
      -webkit-background-size: cover;
      -moz-background-size: cover;
      -o-background-size: cover;
      background-size: cover;
      "></div>
  
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


@endsection
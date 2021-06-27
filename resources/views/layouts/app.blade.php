<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- REALLY IMPORTANT FOR SECTURY CHECKS IN DEPLOYMENT -->
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('page-title')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css">

    <!-- FontAwesome -->
    <link rel = "stylesheet" href = "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/> 

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <!--<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
<!--<link href="https://fonts.googleapis.com/css2?family=Finger+Paint&display=swap" rel="stylesheet">-->
<!-- Main font -->
<link href="https://fonts.googleapis.com/css2?family=Didact+Gothic&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container" style="postion: relative; height: 40px">
            
                <button style="position: absolute; top: 30%; right: 0px; border: none; background-color: transparent">
                    <a id="cart-icon" href="{{ route('cart') }}">
                        <i class="fa fa-shopping-cart" aria-hidden="true" style="font-size: 16px; color: #333333"></i> 
                        @if(Cart::instance('default')->count() > 0)
                        <div class="notifica">
                            <span class="badge badge-pill badge-danger">
                                {{ Cart::instance('default')->count() }}
                            </span>
                        </div>
                        @endif
                    </a>
                </button>
                <a class="navbar-brand" href="{{ url('/') }}" style="width: 100%; font-size: 20px; font-family: 'Finger Paint', cursive; text-align: center">
                    <!--<i id="dot" class="fas fa-circle" style="color: red; font-size: 15px"></i> Red dot-->
                    <div style="width: 50px; height: 50px; position: absolute; top: 0; left: 50%; transform: translate(-50%, 0)">
                        <img class="active" src="{{ asset('img/volcanoLogo.jpg') }}" alt="" style="width: 120%; height: 100%;">
                    </div>
                </a>
                <button style="border: none; background-color: transparent; position: absolute; top: 30%; left: 0px;" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class=""><i class="fas fa-bars" style="color: #333333"></i></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent" data-toggle="collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto" style="height: 70px; line-height: 60px; z-index: 5; color: #000">
                        <li><a class="voci-menu" href="{{ route('products') }}">Tees</a></li>
                        <li><a class="voci-menu" href="{{ route('products') }}">Felpe</a></li>
                        <li><a class="voci-menu" href="{{ route('products') }}">Pantaloni</a></li>
                        <li><a class="voci-menu" href="{{ route('products') }}">Scarpe</a></li>
                        <li><a class="voci-menu" href="{{ route('products') }}">News</a></li>
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="voci-menu" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="voci-menu" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <a class="dropdown-item" href="{{ route('admin.dashboard') }}">
                                       Dashboard
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    
                        <!--<li class="nav-item" style="line-height: 70px; font-size: 18px"><i class="fas fa-shopping-cart"></i></li>
                        <li class="nav-item"><i class="fas fa-bars"></i></li>-->
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4" style="z-index:3">
            @yield('content')
        </main>

        <footer class="fondo">
            
            <div class="container">
                <div class="row">
                    <div class="col-lg-5 left">
                        <ul class="contatti">
                            <li>
                                <img id="logofooter" src="" alt="" />
                            </li>
                            <li>Ragione Sociale: 'Company' S.P.A.</li>
                            <li>Sede legale: Contrada Colle Delle Api, 100/A</li>
                            <li>86100 - City(--)</li>
                            <li>Pec: email@pec.it</li>
                            <li>Tel: +39 0874 4981</li>
                            <li>Fax: +39 0874 629584</li>
                            <li>info@email.it (per segnalazioni degli utenti)</li>
                            <li>commerciale@email.it</li>
                            <li>export@email.it</li>
                            <li>telefono 380-1292455</li>
                            <li class="copyright">Copyright © All rights reserved.</li>
                        </ul>
                    </div>
                    <div class="col-lg-4 central">
              <h5>COMPANY</h5>
              <ul>
                  <li>Company</li>
                  <li>xxxxxxxx</li>
                  <li>xxxxxxxx</li>
                  <li>Infos</li>
                  <li>Our Mission</li>
                  <li>Superhydrophobic</li>
                  <li>Employees</li>
              </ul>
              <h5>PRODUCTS</h5>
              <ul>
                  <li>*Tipo di materiali usati*</li>
                  <li>*Link prodotto*</li>
                  <li>*Link prodotto*</li>
                  <li>*Servizio clienti*</li>
                  <li>*Referenze*</li>
              </ul>
          </div>
          <div class="col-lg-3 right">
          <h5>JOIN US</h5>
              <div class="social-box">
                
              </div>
              <div class="newsletter-box">
                <h6>Subscribe our newsletter</h6>
                <a class="newsletter" href="#">Newsletter</a>
              </div>
          </div>
      </div>
    </div>
          

        </footer>

        <script type="text-">
            @font-face {
    font-family: 'Didact Gothic', sans-serif;
    src: url('https://fonts.googleapis.com/css2?family=Didact+Gothic&display=swap');
}
        </script>
    
</body>
</html>

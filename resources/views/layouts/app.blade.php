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
<body class="container-fluid">
    
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm fixed-top">
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
                        <img src="{{ asset('img/volcanoLogo.jpg') }}" alt="" style="width: 120%; height: 100%; display: block">
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

        <main class="py-4" style="z-index:3; margin-top: 50px">
            @yield('content')
        </main>

        <footer style="width: 100%; min-height: 50px; background-image: url('{{ asset('img/lava.jpg') }}'); padding: 15px;">
        <!-- #97C2C8 - Acqua Soft
            #43D7C5
             #FF4901 - Orange
    -->
            
            <div class="row" style="min-height: 50px">
                <div class="col-lg-12">
                    <div>
                        <input type="text" style="width: 68%; display: inline-block; padding: 5px 10px; border: 1px solid transparent; border-radius: 3px; background-color: #fff;" placeholder="Indirizzo mail*">
                        <button class="" type="submit" style="width: 30%; display: inline-block; background-color: #000; color: #fff; border: 1px solid transparent; border-radius: 3px; height: 33px">Registrati</button>
                        <p style="font-size: 8px; color: #fff; margin: 10px 0">
                        I vostri dati personali saranno trattati da BOARDRIDERS Europe secondo l’informativa sulla privacy di VOLCANO STORE Europe con la finalità di offrirvi o fornirvi i nostri prodotti 
                        e servizi e per tenervi aggiornati sulle nostre novità e collezioni. Potete annullare la sottoscrizione in qualsiasi momento se non volete più ricevere informazioni od offerte da uno dei nostri brand. 
                        Potete anche richiedere di accedere, correggere o cancellare i vostri dati personali e avete il diritto della trasmissibilità dei dati.
                        </p>
                    </div>
                    <div style="color: #fff; margin: 20px 0">
                        <div style="margin: 5px 0"><i class="fas fa-chevron-right" style=""></i> Condizioni Generali di Vendita</div>
                        <div style="margin: 5px 0"><a href="{{ route('info.privacy') }}" style="color: #fff; text-decoration: none"><i class="fas fa-chevron-right" style=""></i> Politica sulla Privacy</a></div>
                        <div style="margin: 5px 0"><i class="fas fa-chevron-right" style=""></i> Chi Siamo</div>
                        <div style="margin: 5px 0"><i class="fas fa-chevron-right" style=""></i> News</div>
                    </div>
                    <div style="height: 50px; border-bottom: 1px solid #fff; color: #fff; text-align: center;">
                        <i class="fab fa-facebook" style="margin: 0 5px; font-size: 20px"></i>
                        <i class="fab fa-instagram" style="margin: 0 5px; font-size: 20px"></i>
                        <i class="fab fa-telegram-plane" style="margin: 0 5px; font-size: 20px"></i>
                    </div>
                    <div style="font-size: 12px; color: #fff; text-align: center;">
                        © 2021 VOLCANO
                    </div>
                </div>
            </div>
          

        </footer>
    
</body>
</html>

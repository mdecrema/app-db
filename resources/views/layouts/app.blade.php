<?php use App\Category; 
    $categories = Category::all();
?>
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

    <!-- include the bar code library -->
    <script src="https://unpkg.com/html5-qrcode"></script>

    <!-- Jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- MomentJS e DataPicker -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

    <!-- ChartJS -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css">

    <!-- FontAwesome -->
    <link rel = "stylesheet" href = "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <script src="https://kit.fontawesome.com/9f4502e548.js" crossorigin="anonymous"></script>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    {{-- <link rel="dns-prefetch" href="//fonts.gstatic.com"> --}}
    <link href="https://fonts.googleapis.com/css2?family=Nunito&family=Gochi+Hand&family=Bungee+Shade&family=Righteous
    &family=Permanent+Marker&family=Abril+Fatface&family=DM+Serif+Text&family=Six+Caps&family=Lily+Script+One&family=Roboto" rel="stylesheet">

<!-- Main font -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Bakbak+One&family=Didact+Gothic&family=Righteous&display=swap" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="container-fluid body">

    <nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top" style="height: 70px; z-index: 10; box-shadow: 2px 2px 10px #231202">
        <!-- -->
        <div style="width: 100%; height: 10px; background-color: #8A5A2C; position: absolute; top: 0; left: 0; z-index: 11">
            <marquee
            loop="-1"
            scrollamount="5"
            scrolldelay="0"
            direction="left"
            height="30"
            width="100%"
            align="right">
                <div style="width: 70vw; height: 10px; background-color: #231202; color: #fff; text-align: center; font-size: 12px">
                    <span>.</span>
                </div>
            </marquee>
        </div>
        <div style="height: 100%; width: 50px; position: absolute; top: 10px; left: 0; line-height: 70px; text-align: center;">
            <a id="cart-icon" href="{{ route('cart') }}">
                <i class="fal fa-shopping-bag" aria-hidden="true" style="font-size: 20px; color: #333333"></i>
                @if(Cart::instance('default')->count() > 0)
                <div class="notifica">
                    <span class="badge badge-pill badge-danger">
                        {{ Cart::instance('default')->count() }}
                    </span>
                </div>
                @endif
            </a>
        </div>
        <a class="navbar-brand" href="{{ url('/') }}" style="width: 100%; font-size: 20px; font-family: 'Finger Paint', cursive; text-align: center">
        <!--<i id="dot" class="fas fa-circle" style="color: red; font-size: 15px"></i> Red dot-->
            <div style="width: 60px; height: 60px; position: absolute; top: 25%; left: 50%; transform: translate(-50%, 0);">
                {{-- <img src="{{ asset('img/volcanoLogo.jpg') }}" alt="" style="width: 150%; height: 120%; display: block"> --}}
                <img src="{{ asset('img/vulcano-logo2.png') }}" alt="" style="width: 100%; height: 80%; margin-left: 10px; display: block">
            </div>
        </a>
        <div onclick="openNav()" style="height: 100%; width: 50px; position: absolute; top: 10px; right: 0; line-height: 68px; font-size: 20px; text-align: center; cursor: pointer">
            <i class="fal fa-bars" style="color: #333333"></i>
        </div>
    </nav>

    <div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <a class="voci-menu" href="{{ route('skiRent') }}">Ski Rent</a>
    @foreach($categories as $category)
    <a class="voci-menu" href="{{ route('productsByType', $category->id) }}">{{ ucfirst($category->title) }}</a>
    @endforeach
    {{-- <a class="voci-menu" href="{{ route('productsByType', 't-shirt') }}">Tees</a>
    <a class="voci-menu" href="{{ route('productsByType', 'hoodies') }}">Felpe</a>
    <a class="voci-menu" href="{{ route('productsByType', 'pants') }}">Pantaloni</a>
    <a class="voci-menu" href="{{ route('productsByType', 'shoes') }}">Scarpe</a> --}}
    <a  class="voci-menu"href="{{ route('news') }}">News</a>
        <!-- Authentication Links -->
       @guest
            <a class="voci-menu-sm" href="{{ route('login') }}">{{ __('Login') }}</a>
            @if (Route::has('register'))
                <a class="voci-menu-sm" href="{{ route('register') }}">{{ __('Register') }}</a>
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

                    @can('admin')
                    <a class="dropdown-item" href="{{ route('admin.dashboard') }}">
                       Dashboard
                    </a>
                    @else
                    
                    @endcan

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </li>
        @endguest
    </div>

        <main class="py-4 div-content" style="min-height: 100vh; z-index:3; margin-top: 50px">
            
            @yield('content')
        </main>

        {{-- <footer class="fondo" style="width: 100%; min-height: 50px; background-image: url('{{ asset('img/lava.jpg') }}'); padding: 15px;">-->
        <!-- #97C2C8 - Acqua Soft
            #43D7C5
            #FF4901 - Orange
            background-image: url('{{ asset('img/lava.jpg') }}')
    -->
            
           <div class="row" style="min-height: 50px; text-shadow: 1px 1px 5px #000">
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
          

        </footer> --}}

    <script type="text/javascript">
        /* Set the width of the side navigation to 250px */
        function openNav() {
            document.getElementById("mySidenav").style.width = "250px";
        }
  
        /* Set the width of the side navigation to 0 */
        function closeNav() {
            document.getElementById("mySidenav").style.width = "0";
        }
    </script>
    
</body>
</html>

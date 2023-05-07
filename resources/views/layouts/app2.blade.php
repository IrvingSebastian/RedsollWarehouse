<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <!-- basic -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- mobile metas -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="viewport" content="initial-scale=1, maximum-scale=1">
        <!-- site metas -->
        <title>{{ config('app.name', 'Laravel') }}</title>
        <meta name="keywords" content="">
        <meta name="description" content="">
        <meta name="author" content="">
        <!-- bootstrap css -->
        <link rel="stylesheet" href="/css/bootstrap.min.css">
        <!-- style css -->
        <link rel="stylesheet" href="/css/style.css">
        <!-- Responsive-->
        <link rel="stylesheet" href="/css/responsive.css">
        <!-- fevicon -->
        <link rel="icon" href="/images/fevicon.png" type="image/gif" />
        <!-- Scrollbar Custom CSS -->
        <link rel="stylesheet" href="/css/jquery.mCustomScrollbar.min.css">
        <!-- Tweaks for older IEs-->
        <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
        <link href="/css/font-awesome.min.css" rel="stylesheet">
        <!-- Scripts -->
        @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    </head>
   <!-- body -->
   <body class="main-layout">
      <!-- loader  -->
      <div class="loader_bg">
         <div class="loader"><img src="/images/loading.gif" alt="#" /></div>
      </div>
      <!-- end loader -->
      <div id="mySidepanel" class="sidepanel">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
        <a class="active" href="{{ url('/') }}">Inicio</a>
        <a href="{{url('piezas')}}">Consultar Piezas</a>
        @auth
            <a href="{{ route('logout') }}" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                {{ __('Cerrar Sesión') }}
            </a>
        @endauth
      </div>
      <!-- header -->
      <header>
         <!-- header inner -->
         <div class="header">
            <div class="container-fluid">
               <div class="row">
                  <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
                     <div class="full">
                        <div class="center-desk">
                           <div class="logo">
                            <a class="navbar-brand" href="{{ url('/') }}">
                                <img src="/images/logo.png" alt="#" />
                            </a>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
                    @guest
                        <div class="right_bottun">
                            @if (Route::has('login')) 
                                <a class="login" href="{{ route('login') }}">{{ __('Iniciar Sesión') }}</a>           
                            @endif
                            @if (Route::has('register'))
                                <a class="login" href="{{ route('register') }}">{{ __('Registrar') }}</a>
                            @endif
                        </div>
                        @else
                            <div class="right_bottun">
                                <a class="login">
                                    {{ Auth::user()->name }}
                                </a>

                                 <button class="openbtn" onclick="openNav()">
                                    <img src="/images/menu_icon.png">
                                 </button> 

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                    @endguest
                  </div>
               </div>
            </div>
         </div>
      </header>
      <!-- end header inner -->
      
      <!-- Wea 
      <section class="banner_main">
        <div id="banner1" class="carousel slide" data-ride="carousel">
            <div class="carousel-item active">
                <div class="container">
                    <div class="carousel-caption">
                    <div class="text-bg">
                        <h1>Redsoll WAREHOUSE</h1>
                    </div>
                    </div>
                </div>
            </div>
        </div>
      </section>
      -->

    <main class="py-4">
        <div id="about" class="about afbecros">
            @yield('content')
        </div>
    </main>
    
      <!--  footer -->
      <footer>
         <div class="footer">
            <div class="container">
               <div class="row">
                  <div class="col-md-8 offset-md-2">
                     <div class="fid_box">
                        <ul class="location_icon">
                           <li><a href="#"><i class="fa fa-map-marker" aria-hidden="true"></i></a><br> Ubicación</li>
                           <li><a href="#"><i class="fa fa-phone" aria-hidden="true"></i></a><br> Número de teléfono
                           </li>
                           <li><a href="#"><i class="fa fa-envelope" aria-hidden="true"></i></a><br> Correo electrónico </li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
            <div class="copyright">
               <div class="container">
                  <div class="row">
                     <div class="col-md-12">
                        <p>© 2023 Todos los derechos reservados</p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </footer>
      <!-- end footer -->
      <!-- Javascript files-->
      <script src="/js/jquery.min.js"></script>
      <script src="/js/popper.min.js"></script>
      <script src="/js/bootstrap.bundle.min.js"></script>
      <script src="/js/jquery-3.0.0.min.js"></script>
      <!-- sidebar -->
      <script src="/js/jquery.mCustomScrollbar.concat.min.js"></script>
      <script src="/js/custom.js"></script>
      <script>
         function openNav() {
           document.getElementById("mySidepanel").style.width = "250px";
         }
         
         function closeNav() {
           document.getElementById("mySidepanel").style.width = "0";
         }
      </script>
   </body>
</html>


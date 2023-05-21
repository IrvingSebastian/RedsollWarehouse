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
         <meta name="keywords" content="REDSOLL WAREHOUSE">
         <meta name="description" content="TECNOLOGÍA PARA TODOS">
         <meta name="author" content="REDSOLL">
         <!-- bootstrap css -->
         <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" media="screen">
         <!-- style css -->
         <link rel="stylesheet" href="{{asset('css/style.css')}}" media="screen"/>
         <link rel="stylesheet" href="{{asset('css/responsive.css')}}" media="screen"/>
         <link rel="stylesheet" href="{{asset('css/jquery.fancybox')}}" media="screen"/>
         <link rel="stylesheet" href="{{asset('css/jquery-ui')}}" media="screen">
         <!-- fevicon -->
         <link rel="icon" href="{{asset('images/favicon.ico')}}" media="screen"/>
         <!-- Tweaks for older IEs-->
         <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" media="screen">  
         <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
         <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}" media="screen">
         <!--[if lt IE 9]>
         <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
         <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
         <!-- Fonts -->
         <link rel="dns-prefetch" href="{{asset('fonts.gstatic.com')}}" media="screen">
         <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet" media="screen">
    </head>
   <!-- body -->

   <body class="main-layout">
      <!-- loader  -->
      <div class="loader_bg">
         <div class="loader"><img src="{{asset('images/loading.gif')}}" alt="#" /></div>
      </div>
      <!-- end loader -->
      <div id="mySidepanel" class="sidepanel">
         <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
         @auth
            @if (Auth::user()->rol == "Jefe de Almacen")
               <a 
                  @if (Request::is('home2'))
                        class="active"      
                  @endif   
                     href="{{ url('/home2') }}">Inicio</a>
            @else
               <a 
                  @if (Request::is('home'))
                        class="active"      
                  @endif   
                     href="{{ url('/home') }}">Inicio</a>
            @endif
            <a 
            @if (Request::is('piezas/*') || Request::is('piezas'))
                  class="active"      
            @endif         
            href="{{url('piezas')}}">Consultar Piezas</a>
            @if (Auth::user()->rol == 'Instalador')
               <a
               @if (Request::is('visualizar'))
                     class="active"
               @endif
               href="{{url('visualizar')}}">Visualizar Impresión</a>
            @endif

            @if (Auth::user()->rol == 'Jefe de Almacen')
               <a
               @if (Request::is('register'))
                     class="active"
               @endif
               href="{{route('register')}}">Registrar Usuarios</a>
            @endif

            <a href="{{ route('logout') }}" onclick="event.preventDefault();
               document.getElementById('logout-form').submit();">
               Cerrar Sesión
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
                                 <img src="{{asset('images/logo.png')}}" alt="#" />
                              </a>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
                    @guest
                        <div class="right_bottun">
                            @if (Route::has('login')) 
                                <a class="login" href="{{ route('login') }}">Iniciar Sesión</a>           
                            @endif
                        </div>
                        @else
                            <div class="right_bottun">
                                 <a class="login">                               
                                       {{ Auth::user()->rol }} - {{ Auth::user()->name }}                                                     
                                 </a>
                                 <a style="cursor: pointer" class="login" onclick="openNav()">
                                    <img src="{{asset('images/menu_icon.png')}}" alt="#" />
                                 </a>
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
                        <li><i class="fa fa-phone" aria-hidden="true"></i><br> 442 810 07 55</li>
                        <li><i class="fa fa-envelope" aria-hidden="true"></i><br> administracion@redsoll.com </li>
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
      <script src="{{ asset('js/jquery.min.js') }}" async></script>
      <script src="{{ asset('js/jquery-3.0.0.min.js') }}" async></script>
      <!-- sidebar -->
      <script src=" {{ asset('js/custom.js') }}" async></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous" async></script>
      <script async>
         function openNav() {
            document.getElementById("mySidepanel").style.width = "250px";
         }
         
         function closeNav() {
            document.getElementById("mySidepanel").style.width = "0";
         }
      </script>
      @yield('scripts')
   </body>
</html>

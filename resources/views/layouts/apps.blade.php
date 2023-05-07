<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">

    <title>ALGWORK</title>

    <link rel="stylesheet" type="text/css" href="{{ asset('assets1/css/bootstrap.min.css') }}">


    <link rel="stylesheet" type="text/css" href="{{ asset('assets1/css/font-awesome.css') }}">

    <link rel="stylesheet" href="{{ asset('assets1/css/style.css') }}">

    <base href="{{URL::asset('/')}}" target="_top">

    </head>

    <body>

    <!-- ***** Preloader Start ***** -->
    <div id="js-preloader" class="js-preloader">
      <div class="preloader-inner">
        <span class="dot"></span>
        <div class="dots">
          <span></span>
          <span></span>
          <span></span>
        </div>
      </div>
    </div>
    <!-- ***** Preloader End ***** -->


    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="index.html" class="logo">Job Agency<em> Website</em></a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li><a href="{{url('/')}}" class="{{Request::is('/') ?'active':'';}}">Home</a></li>
                            <li><a href="{{url('employeur')}}" class="{{Request::is('employeur') ?'active':'';}}">employeurs</a></li>
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">notre services</a>

                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="{{url('jobs')}}">jobs</a>
                                    <a class="dropdown-item" href="{{url('lsprojets')}}">projet </a>
                                    <a class="dropdown-item" href="{{url('lsannonces')}}">annonce</a>
                                    <a class="dropdown-item" href="{{url('lsidée')}}">idée</a>
                                </div>
                            </li>
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">About</a>

                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="about.html">About Us</a>
                                    <a class="dropdown-item" href="team.html">Team</a>
                                    <a class="dropdown-item" href="team.html">contact</a>
                                    <a class="dropdown-item" href="blog.html">Blog</a>
                                    <a class="dropdown-item" href="testimonials.html">Testimonials</a>
                                    <a class="dropdown-item" href="terms.html">Terms</a>
                                </div>
                            </li>
                                     @guest
                                     <li class="dropdown">
                                        <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">connexion</a>

                                        <div class="dropdown-menu">
                                      @if (Route::has('login'))
                                              <a class="dropdown-item" href="{{ route('login') }}">connecter vous</a>
                                      @endif

                                      @if (Route::has('register'))
                                              <a class="dropdown-item" href="{{ route('register') }}">inscriver vous</a>
                                      @endif
                                  @else
                                  <li class="dropdown">
                                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }}</a>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                     <a class="dropdown-item" href="{{url('vcv')}}">votre CV's </a>
                                     <a class="dropdown-item" href="{{url('vtrv')}}">votre travaille </a>
                                     <a class="dropdown-item" href="{{url('vcand')}}">votre candidature </a>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                            se déconnecter
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                                  @endguest
                            </li>
                        </ul>
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>

    <!-- ***** Header Area End ***** -->
    <!-- jQuery -->
    <script src="{{ asset('assets1/js/jquery-2.1.0.min.js') }}"></script>

    <!-- Bootstrap -->
    <script src="{{ asset('assets1/js/popper.js') }}"></script>
    <script src="{{ asset('assets1/js/bootstrap.min.js') }}"></script>

    <!-- Plugins -->
    <script src="{{ asset('assets1/js/scrollreveal.min.js') }}"></script>
    <script src="{{ asset('assets1/js/waypoints.min.js') }}"></script>
    <script src="{{ asset('assets1/js/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('assets1/js/imgfix.min.js') }}"></script>
    <script src=" {{ asset('assets1/js/mixitup.js') }}"></script>
    <script src="{{ asset('assets1/js/accordions.js') }}"></script>

    <!-- Global Init -->
    <script src="{{ asset('assets1/js/custom.js') }}"></script>
    <script src="{{ asset('js/js1.js') }}"></script>


    <main >
        @yield('content')
    </main>

  </body>
</html>


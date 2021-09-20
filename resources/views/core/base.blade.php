<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Ecom </title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <!-- Bootstrap core CSS -->
    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="{{asset('assets/css/mdb.min.css')}}" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="{{asset('assets/css/style.min.css')}}" rel="stylesheet">
    <style type="text/css">
      html,
      body,
      header,
      .carousel {
        height: 60vh;
      }

      @media (max-width: 740px) {

        html,
        body,
        header,
        .carousel {
          height: 100vh;
        }
      }

      @media (min-width: 800px) and (max-width: 850px) {

        html,
        body,
        header,
        .carousel {
          height: 100vh;
        }
      }

    </style>
</head>
<body>
    <nav class="navbar fixed-top navbar-expand-lg navbar-light white scrolling-navbar">



        <div class="container">

          <!-- Brand -->
          <a class="navbar-brand waves-effect" href="{{ route('home') }}">
            <strong class="blue-text">Ecom</strong>
          </a>

          <!-- Collapse -->
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <!-- Links -->
          <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <!-- Left -->
            <ul class="navbar-nav ml-auto">
              <li class="nav-item active">
                <a class="nav-link waves-effect" href="#">Home
                  <span class="sr-only">(current)</span>
                </a>
              </li>

             @auth
             <li class="nav-item">
                <a class="nav-link waves-effect" href="">Profile</a>
              </li>
              <li class="nav-item">
              <form method="POST" action="{{route('logout')}}">
                @csrf
                <button type="" class="nav-link bg-white border-0 waves-effect" href="{{route('login')}}">Logout</button>
              </form>
            </li>

             @endauth

             @guest
             <li class="nav-item">
              <a class="nav-link waves-effect" href="{{route('login')}}">Login</a>
            </li>
            <li class="nav-item">
              <a class="nav-link waves-effect" href="{{route('register')}}">Register</a>
            </li>
             @endguest
              <li class="nav-item">
                <a class="nav-link waves-effect" href="{{route('cart')}}">
                  <span class="badge red z-depth-1 mr-1"> 1 </span>
                  <i class="fas fa-shopping-cart"></i>
                  <span class="clearfix d-none d-sm-inline-block"> Cart </span>
                </a>
              </li>
            </ul>

          </div>

        </div>
      </nav>

      @section('content')

      @show


      <footer class="page-footer text-center font-small mt-4 wow fadeIn">



        <hr class="my-4">

        <!-- Social icons -->
        <div class="pb-4">
          <a href="https://www.facebook.com/mdbootstrap" target="_blank">
            <i class="fab fa-facebook-f mr-3"></i>
          </a>

          <a href="https://twitter.com/MDBootstrap" target="_blank">
            <i class="fab fa-twitter mr-3"></i>
          </a>

          <a href="https://www.youtube.com/watch?v=7MUISDJ5ZZ4" target="_blank">
            <i class="fab fa-youtube mr-3"></i>
          </a>

          <a href="https://plus.google.com/u/0/b/107863090883699620484" target="_blank">
            <i class="fab fa-google-plus-g mr-3"></i>
          </a>

          <a href="https://dribbble.com/mdbootstrap" target="_blank">
            <i class="fab fa-dribbble mr-3"></i>
          </a>

          <a href="https://pinterest.com/mdbootstrap" target="_blank">
            <i class="fab fa-pinterest mr-3"></i>
          </a>

          <a href="https://github.com/mdbootstrap/bootstrap-material-design" target="_blank">
            <i class="fab fa-github mr-3"></i>
          </a>

          <a href="http://codepen.io/mdbootstrap/" target="_blank">
            <i class="fab fa-codepen mr-3"></i>
          </a>
        </div>
        <!-- Social icons -->

        <!--Copyright-->
        <div class="footer-copyright py-3">
          © 2019 Copyright:
          <a href="https://mdbootstrap.com/education/bootstrap/" target="_blank"> MDBootstrap.com </a>
        </div>
        <!--/.Copyright-->

      </footer>
      <!--/.Footer-->

      <!-- SCRIPTS -->
      <!-- JQuery -->
      <script type="text/javascript" src="{{asset('assets/js/jquery-3.4.1.min.js')}}"></script>
      <!-- Bootstrap tooltips -->
      <script type="text/javascript" src="{{asset('assets/js/popper.min.js')}}"></script>
      <!-- Bootstrap core JavaScript -->
      <script type="text/javascript" src="{{asset('assets/js/bootstrap.min.js')}}"></script>
      <!-- MDB core JavaScript -->
      <script type="text/javascript" src="{{asset('assets/js/mdb.min.js')}}"></script>
      <!-- Initializations -->
      <script type="text/javascript">
        // Animations initialization
        new WOW().init();

      </script>
    </body>

    </html>



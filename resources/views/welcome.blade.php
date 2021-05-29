<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" style="margin: 0; height: 100%;  overflow: hidden">
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>AOS - Automated Oral Scoring</title>
<!--===============================================================================================-->
                                <!-- icon tape -->
  <link rel="icon" type="image/png" href="{{asset('loginn/images/logo.PNG')}}" sizes="20x20"/>
<!--===============================================================================================-->
                            <!-- Bootstrap core CSS -->
  <link href="{{asset('homepage/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
<!--===============================================================================================-->
                        <!-- Custom fonts for this template -->
  <link href="{{asset('homepage/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>
<!--===============================================================================================-->
                        <!-- Custom styles for this template -->
  <link href="{{asset('homepage/css/agency.min.css')}}" rel="stylesheet">
<!--===============================================================================================-->
</head>
<body id="page-top" style="margin: 0; height: 100%;  overflow: hidden">

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
    <div class="container">
        <img class="navbar-brand" src="{{asset('loginn/images/logo.PNG')}}" alt="" style="width:150px;float:left;position:relative;right:100px"><span style="position:relative;right:159px;font-size:13px">Automated</span> <span style="position:relative;right:230px;top:5px;font-size:13px"><br>Oral Scoring</span>
          <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars"></i>
        </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav text-uppercase ml-auto">
        <!-- @guest
        <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="{{ route('login') }}">{{ __('Login') }}</a>
          </li>
          
            @if (Route::has('register'))
            <li class="nav-item">
                <a class="nav-link js-scroll-trigger" href="{{ route('register') }}">Register</a>
            </li>
            @endif
            @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest        -->
          
        </ul>
      </div>
    </div>
  </nav>

 
                            
                        

  <!-- Header -->
  <header class="masthead" >
    <div class="container" style="text-align:left;">
      <div class="intro-text" style="position:relative;top:5px;">
        <div class="intro-lead-in"  style="font-size:60px;color:#0C2543;position:relative;bottom:110px;font-weight:bold"> Education  </div>
        <div class="intro-lead-in"  style="font-size:60px;color:#0C2543;position:relative;bottom:105px;"> for you  </div>
        <div style="color:#8c92ac;position:relative;bottom:80px;right:10px"> 
            our application help you to make an online exam this will be <br>
            through professor will make an exam from the website  <br>
            then the students will take their exam through the application
        </div>
        <a class="btn btn-primary btn-xl text-uppercase" href="{{ route('login') }}"  style="background-color:#ff1234;border-radius:66px;height:10px;border:none;"><span style="position:relative;bottom:12px">{{ __('Enter') }}</span></a>
        <a class="btn btn-primary btn-xl text-uppercase  " style="background-color:#0C2543;display:none;" href="">More INFO</a>
      </div>
    </div>
  </header>
<!--===============================================================================================-->
                        <!-- Bootstrap core JavaScript -->
  <script src="{{asset('homepage/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('homepage/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!--===============================================================================================-->
                        <!-- Custom scripts for this template -->
  <script src="{{asset('homepage/js/agency.min.js')}}"></script>
<!--===============================================================================================-->
</body>
</html>

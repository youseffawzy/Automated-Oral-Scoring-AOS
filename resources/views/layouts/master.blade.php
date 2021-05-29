<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
    <!--===============================================================================================-->
                                        <!-- tap-icon -->
    <link rel="shortcut icon" type="image/png" href="{{asset('loginn/images/logo.PNG')}}">
    <link rel="shortcut icon" sizes="192x192" href="{{asset('loginn/images/logo.PNG')}}">
    <link rel="apple-touch-icon" href="{{asset('loginn/images/logo.PNG')}}">
    <link rel="icon" sizes="192x192" type="image/png" href="{{asset('loginn/images/logo.PNG')}}" />
    <!--===============================================================================================-->
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <!--------- inherit the title at every where on the project -------------->
  <title>
    @yield('title') 
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--===============================================================================================-->
                                          <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <!--===============================================================================================-->
                                          <!-- CSS Files -->
  <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" />
  <link href="{{asset('assets/css/now-ui-dashboard.css?v=1.5.0')}}" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="{{asset('css/showcourses.css')}}">
  <!--===============================================================================================-->
  <!-- CSS Just for demo purpose-->
  <!-- <link href="{{asset('assets/demo/demo.css')}}" rel="stylesheet" /> -->
</head>

<body class="">
  <div class="wrapper ">


    <div class="sidebar" data-color="blue"> <!-- this is the sidebar -->
      <!-- You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow" -->
      <div class="logo">
         <a href="/home" class="simple-text logo-mini" style="width:60px;height:50px;position:relative;bottom:8px">
               <img class="navbar-brand" src="{{asset('loginn/images/logo.PNG')}}" alt="" >
        </a>   
         <a href="/home" class="simple-text logo-normal" style="width:100px;height:50px;position:relative;right:25px">
          AOS   System
        </a>
      </div>
      <div class="sidebar-wrapper" id="sidebar-wrapper">
        <ul class="nav">
          <li class="{{ 'home'== request()->path() ? 'active' : '' }}"> 
            <a href="/home">
              <i class="now-ui-icons design_app"></i>
              <p>Courses</p>
            </a>
          </li>
      
          @auth

          @if (session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
            @if (auth()->user()->isAdmin())

          <li class="{{ 'users'== request()->path() ? 'active' : '' }}">
            <a href="{{ route('users.index') }}">
              <i class="now-ui-icons location_map-big"></i>
              <p>Users</p>
            </a>
          </li>
          @endif
          
          <li class="{{ ''== request()->path() ? 'active' : '' }}">
            <a href="{{ route('users.edit', Auth()->user()->id) }}">
              <i class="now-ui-icons users_single-02"></i>
              <p>User Profile</p>
            </a>    
            @endauth
          </li>
         
        </ul>
      </div>
    </div>


    <div class="main-panel" id="main-panel">
      
    <!-- this is the Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent  bg-primary  navbar-absolute">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand" href="" style="color:#131d38"></a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
          
          
            <ul class="navbar-nav">
              <li class="nav-item">
                <p class="nav-link" href="#" style="color:#131d38"> 
                  <i class="now-ui-icons media-2_sound-wave"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Stats</span>
                  </p>
                </p>
              </li>


              <li class="nav-item dropdown" >
                  <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre style="color:#131d38"> 
                    {{ Auth::user()->fname }}  {{ Auth::user()->mname }} <span class="caret"></span>
                  </a>

                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"> {{ __('Logout') }} </a>
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      @csrf
                      </form>
                  </div>
              </li>
              
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->

      
      <div class="panel-header panel-header-sm">
      </div>
      <!-- this is the content -->
      <div class="content">
      @yield('content')
        


      </div>


      <footer class="footer">
        <div class=" container-fluid ">
          <nav>
            
          </nav>
          <div class="copyright" id="copyright">copyright
            &copy; <script>
              document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))
            </script> all rights reserved.
          </div>
        </div>
      </footer>
    </div>
  </div>
<!----------------------------------------------------------------------------------------------------------------------------->
  <!--  JS Files   -->
  <script src="{{asset('assets/js/core/jquery.min.js')}}"></script>
  <script src="{{asset('assets/js/core/popper.min.js')}}"></script>
  <script src="{{asset('assets/js/core/bootstrap.min.js')}}"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
<!----------------------------------------------------------------------------------------------------------------------------->
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="{{asset('assets/js/now-ui-dashboard.min.js?v=1.5.0')}}" type="text/javascript"></script>
  <script src="{{asset('assets/demo/demo.js')}}"></script>
  @yield('scripts')
</body>

</html>
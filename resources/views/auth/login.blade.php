<!DOCTYPE html>
<html lang="en" style="margin: 0; height: 100%;  overflow: hidden">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Login</title> 
    <!--===============================================================================================-->
                                        <!-- tap-icon -->	
    <link rel="shortcut icon" type="image/png" href="{{asset('loginn/images/logo.PNG')}}">
    <link rel="shortcut icon" sizes="192x192" href="{{asset('loginn/images/logo.PNG')}}">
    <link rel="apple-touch-icon" href="{{asset('loginn/images/logo.PNG')}}">
    <link rel="icon" sizes="192x192" type="image/png" href="{{asset('loginn/images/logo.PNG')}}" />    
    <!--===============================================================================================-->	
                                        <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!--===============================================================================================-->
                                        <!-- Styles -->
	<link rel="icon" type="image/png" href="{{ asset('loginn/images/logo.PNG')}}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('loginn/css/util.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('loginn/css/main.css')}}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.0/trix.css" >
    <!--===============================================================================================-->
</head>
<body style="background-color:#ebeeef;margin: 0; height: 100%; overflow: hidden">
    <nav class="navbar navbar-expand-md navbar-light " style="background-color:#ebeeef;" >
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}" style="font-size:22px;  font-weight: bold;color:#8c92ac">
                    {{ 'Home' }}
                </a>
                

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto"></ul>
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                        @guest
                            <li class="nav-item" >
                                <a class="nav-link " href="{{ route('login') }}" style="color:black;font-size:18px;display:none">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}" style="display:none">{{ __('Register') }}</a>
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
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

<div class="container" >
    <div class="row justify-content-center">
        
        <!--===============================================================================================-->	
        <div class="limiter">
		<div class="container-login100" >
			<div class="wrap-login100" style="height: 550px;position: fixed;top: 12%;">
				<div class="login100-form-title" style="background-image: url(loginn/images/bg-01.jpg);">
					<span class="login100-form-title-1">
						Sign In
					</span>
				</div>
        <!--===============================================================================================-->
                    <form  class="login100-form validate-form"  method="POST" action="{{ route('login') }}">
                        @csrf
        <!--===============================================================================================-->
        <!--===============================================================================================-->	
                                            <!-- E-Mail Address-->
                            <div class="wrap-input100 validate-input m-b-26" data-validate="E-mail is required">
                                    <span for="email" class="label-input100">{{ __('E-Mail Address') }}</span>
                                            <input id="email" type="email" class="input100  @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Enter E-mail">
                                            <span class="focus-input100"></span>
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                            </div>
        <!--===============================================================================================-->
                                                <!-- password -->
                       <div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
						    <span class="label-input100">{{ __('Password') }}</span>						    				
                                <input id="password" type="password" class="input100  @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Enter password">
                                <span class="focus-input100"></span>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
        <!--===============================================================================================-->
                                                <!-- remember me -->
                        <!--<div class="form-group row">-->
                            <!--<div class="col-md-6 offset-md-4">-->
                                <div class="flex-sb-m w-full p-b-30">
                                    <div class="contact100-form-checkbox">  
                                        <!-- <div class="form-check">
                                            <input class="input-checkbox100 form-check-input" type="checkbox" name="remember" id="remember ckb1" {{ old('remember') ? 'checked' : '' }}>
                                            <label class="form-check-label label-checkbox100" for="remember ckb1"> {{ __('Remember Me') }} </label>
                                        </div> -->
                                    </div>
                                    <!--
                                    <div>
                                        @if (Route::has('password.request'))
                                            <a class="txt1" href="{{ route('password.request') }}">
                                                {{ __('Forgot Your Password?') }}
                                            </a>
                                        @endif
                                    </div>
                                    -->
                                </div>
        <!--===============================================================================================-->
                                                <!-- Login button -->                                
                        <div class="container-login100-form-btn">					
                                <button type="submit" class="login100-form-btn" style="margin:30px">
                                    {{ __('Login') }}
                                </button>

                        </div>
        <!--===============================================================================================-->
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
        <!--===============================================================================================-->
            <!-- js files -->
    <script src="{{ asset('loginn/js/main.js')}}"></script>
    <script src="{{ asset('js/app.js') }}" ></script>
</body>
</html>
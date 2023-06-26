<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>laravel Event</title>
   
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:700%7CNunito:300,600" rel="stylesheet">

    <link type="text/css" rel="stylesheet" href="{{ asset('front/css/bootstrap.min.css')}}" />

    <link rel="stylesheet" href="{{asset('front/css/font-awesome.min.css')}}">

    <link type="text/css" rel="stylesheet" href="{{asset('front/css/style.css')}}" />
</head>

<body @error('email') class="modal-open" 
style="padding-right: 15px;"
@enderror>

    <!-- Header -->
    <header id="header">
        <!-- Nav -->
        <div id="nav">
            <!-- Main Nav -->
            <div id="nav-fixed">
                <div class="container">
                    <!-- logo -->
                    
                    <div class="nav-logo">
                       
                        <a href="index.html" class="logo"><img src="{{asset('front/img/logo-no-background.png')}}" alt=""  width='10px' height="40px"></a>
                    </div>
                    <!-- /logo -->

                    <!-- nav -->
                    <ul class="nav-menu nav navbar-nav">
                        <li class="cat-1"><a href="/">Home</a></li>
                        <li class="cat-2"><a href="/about">About</a></li>
                        <li class="cat-3"><a href="/calendar">Events</a></li>
                        <li class="cat-4"><a href="/contact">Contact</a></li>
                        <li class="cat-5"><a href="/faqs">FAQs</a></li>
                    </ul>
                    <!-- /nav -->

                    <!-- search & aside toggle -->
                    <div class="nav-btns">
                        <button class="aside-btn"><i class="fa fa-bars"></i></button>
                        <button class="search-btn"><i class="fa fa-search"></i></button>
                        {{-- <div class="search-form">
                            <input class="search-input" type="text" name="search" placeholder="Enter Your Search ...">
                            <button class="search-close"><i class="fa fa-times"></i></button>
                        </div> --}}
                        <form class="search-form" action="{{ route('events.index') }}" method="GET">
                            <input class="search-input" type="text" name="category" placeholder="Search by category">
                            <button class="search-btn" type="submit"><i class="fa fa-search"></i></button>
                           <button class="search-close"><i class="fa fa-times"></i></button>
                        </form>
                    
                        @if (Auth::check())
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="fa fa-sign-out" title="logout"></i>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                        
                    @else
                        <span data-toggle="modal" data-target="#authModal"><i class="fa fa-user" ></i></span>
                    @endif
                    
                    </div>
                    <!-- /search & aside toggle -->
                </div>
             
            </div>
            <!-- /Main Nav -->

            <!-- Asie Nav -->
            <div id="nav-aside">
                <!-- nav -->
                <div class="section-row">
                    <ul class="nav-aside-menu">
                        <li><a href="/">Home</a></li>
                        <li><a href="#">About Us</a></li>
                        <li><a href="/contact">Contact Us</a></li>
                    </ul>
                </div>
                <!-- /nav -->


                <!-- social links -->
                <div class="section-row">
                    <h3>Follow us</h3>
                    <ul class="nav-aside-social">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                    </ul>
                </div>
                <!-- /social links -->

                <!-- aside nav close -->
                <button class="nav-aside-close"><i class="fa fa-times"></i></button>
                <!-- /aside nav close -->
            </div>
            <!-- Aside Nav -->
        </div>
        <!-- /Nav -->
    </header>
    <!-- /Header -->
 
    @yield('content')


    <!-- Footer -->
    <footer id="footer">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-5">
                    <div class="footer-widget">
                        <div class="footer-logo">
                            <a href="index.html" class="logo"><img src="{{asset('front/img/logo-no-background.png')}}" alt=""width='200px' height="40px"></a>
                        </div>
                        <ul class="footer-nav">
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">Advertisement</a></li>
                        </ul>
                        <div class="footer-copyright">
                            <span>&copy;
                                <!-- Link back to Colorlib cant be removed. Template is licensed under CC BY 3.0. -->
                                Copyright &copy;<script>
                                    document.write(new Date().getFullYear());

                                </script> All rights reserved | This template is made with <i class="fa fa-heart-o"
                                    aria-hidden="true"></i> by <a href="#"
                                    target="_blank">Nadia😉</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="footer-widget">
                                <h3 class="footer-title">About Us</h3>
                                <ul class="footer-links">
                                    <li><a href="about.html">About Us</a></li>
                                    <li><a href="#">Join Us</a></li>
                                    <li><a href="contact.html">Contacts</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="footer-widget">
                                <h3 class="footer-title">Catagories</h3>
                                <ul class="footer-links">
                                    <li><a href="category.html">Sport</a></li>
                                    <li><a href="category.html">Studies</a></li>
                                    <li><a href="category.html">Life</a></li>
                                    <li><a href="category.html">Jobs</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
        <div class="col-md-3">
        <div class="footer-widget">
            <h3 class="footer-title">Join our Newsletter</h3>
            <div class="footer-newsletter">
                <form>
                    <input class="input" type="email" name="newsletter" placeholder="Enter your email">
                    <button class="newsletter-btn"><i class="fa fa-paper-plane"></i></button>
                </form>
            </div>
            <ul class="footer-social">
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
            </ul>
        </div>
    </div>

</div>
<!-- /row -->
</div>
<!-- /container -->
</footer>
<!-- /Footer -->

<!-- jQuery Plugins -->
<script src="{{asset('front/js/jquery.min.js')}}"></script>
<script src="{{asset('front/js/bootstrap.min.js')}}"></script>
<script src="{{asset('front/js/main.js')}}"></script>
 {{-- modal start --}}
               <!-- Modal -->
               <div 
               @error('email')
               class="modal fade in"
               @else
               class="modal fade"
               @enderror
               
                id="authModal" tabindex="-1" role="dialog" aria-labelledby="authModalLabel" aria-hidden="true" 
                @error('email')
                style="display: block; padding-right: 17px;
              "
                @else
                style="display: none;"
                @enderror
               >
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="authModalLabel">Authentication</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <!-- Laravel Breeze authentication views -->
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col-md-8">
                                        <div class="card">
                                            <div class="card-header">{{ __('Login') }}</div>
            
                                            <div class="card-body">
                                                <form method="POST"  d="registration-form" action="{{ route('login') }}">
                                                    @csrf
            
                                                    <div class="form-group row"  >
                                                        <label for="email" class="col-md-2 col-form-label text-md-right">{{ __('E-Mail') }}</label>
            
                                                        <div class="col-md-6" style="margin-right:150px">
                                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
            
                                                            @error('email')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
            
                                                    <div class="form-group row">
                                                        <label for="password" class="col-md-2 col-form-label text-md-right">{{ __('Password') }}</label>
            
                                                        <div class="col-md-6" style="margin-right:150px">
                                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
            
                                                            @error('password')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
            
                                                    <div class="form-group row">
                                                        <div class="col-md-6 offset-md-4">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
            
                                                                <label class="form-check-label" for="remember">
                                                                    {{ __('Remember Me') }}
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
            
                                                    <div class="form-group row mb-0">
                                                        <div class="col-md-8 offset-md-4">
                                                            <button type="submit" class="btn btn-primary">
                                                                {{ __('Login') }}
                                                            </button>
            
                                                            @if (Route::has('password.request'))
                                                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                                                    {{ __('Forgot Your Password?') }}
                                                                </a>
                                                            @endif
                                                            <div class="modal-footer">
                                                                <a href="#" data-toggle="modal" data-target="#signup-modal" data-dismiss="modal">{{ __('Not a member? Sign up now') }}</a>
                                                            </div>
                                                        </div>
                                                    </div></form></div></div></div></div>
                            </div></div></div></div></div>
                    
                           {{-- modal end --}}
                              <!-- Sign up modal -->
<div class="modal fade" id="signup-modal" tabindex="-1" role="dialog" aria-labelledby="signup-modal-label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="signup-modal-label">Sign up</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="clearErrorSession()">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="form-group">
                        <label for="name">{{ __('Name') }}</label>
                        <input  name="name" type="text" class="form-control"/>
                    
                    </div>
                        <div class="form-group">
                            <label for="email">{{ __('Email') }}</label>
                            <input  name="email" type="email" class="form-control" />
                        </div>
                        
                        <div class="form-group">
                            <label for="password">{{ __('Password') }}</label>
                            <input  name="password" type="password" class="form-control"/>
                        </div>
                        
                        <div class="form-group">
                            <label for="password-confirm">{{ __('Confirm Password') }}</label>
                            <input  name="password_confirmation" type="password" class="form-control" />
                        </div>
                        
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">{{ __('Sign up') }}</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Close') }}</button>
                        </div>
                        </form>
                        </div>
                        </div>
                        </div>
                        </div>

 <div @error('email') class="modal-backdrop fade in" onclick="clearErrorSession()" @enderror></div>
                        <script>
                            // Intercept the click event on the close button
                            document.querySelector('.search-close').addEventListener('click', function(e) {
                                e.preventDefault();  // Prevent the default behavior of the form submission
                                document.getElementById('search-form').reset();  // Reset the search form
                                document.querySelector('.search-form').classList.remove('active');  // Hide the search bar
                            });

 function clearErrorSession() {
  // Send an AJAX request to the server to clear the error session
  var xhr = new XMLHttpRequest();
  xhr.open('GET', '/clear-error-session', true);
  xhr.send();

  // Reload the page after clearing the error session
  xhr.onload = function() {
    if (xhr.status === 200) {
      location.reload();
    }
  };
}
                        </script>

</body>

</html>
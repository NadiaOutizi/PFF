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
<style>

    /* animation btn Start */
    :root
{
    --main-color : #2196f3;
    --main-color-alt : #005eac;
    --main-transition : .5s;
    --main-padding-top:100px;
    --main-padding-bottom:100px;
    --section-background : #ececec;
}


.main-title
{
    margin: auto;
    /* margin-bottom: 80px; */
    font-size: 25px;
    border: 2px solid black;
    width: fit-content;
    position: relative;
    z-index: 1;
    padding:8px 20px;
    transition: var(--main-transition);
    
}

.main-title:hover
{
    color: #fff;
    transition-delay: .5s;
    border: 2px solid white;
}

.main-title::before,
.main-title::after
{
    content: '';
    width: 12px;
    height: 12px;
    background-color: var(--main-color);
    position: absolute;
    border-radius: 50%;
    top: 50%;
    transform: translateY(-50%);
}

.main-title:hover::before
{
    z-index: -1;
    animation: left-move 0.5s ease-in-out forwards;
}

.main-title:hover::after
{
    z-index: -1;
    animation: right-move 0.5s ease-in-out forwards;
}

.main-title::before
{
    left: -30px;
}
.main-title::after
{
    right: -30px;
}



    @keyframes left-move {
    50%{
        left: 0;
        width: 12px;
        height: 12px;
    }

    100%{
        left: 0;
        border-radius: 0;
        width: 50%;
        height: 100%;
    }
}

@keyframes right-move {
    50%{
        right: 0;
        width: 12px;
        height: 12px;
    }

    100%{
        right: 0;
        border-radius: 0;
        width: 50%;
        height: 100%;
    }
}

    /* animation btn End */
</style>
</head>

<body>

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
                        <li class="cat-2"><a href="#">About</a></li>
                        <li class="cat-3"><a href="#">Events</a></li>
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
 
<div class="col-md-2" style="margin-left: 355px; margin-top: 100px;">
    <h1 class="main-title">Participants</h1>
    <br>
    @php $visibleRegistrations = 3; @endphp
    @if ($event->registrations->isEmpty())
        <p>No participants in this event yet.</p>
    @else
        @foreach ($event->registrations as $key => $registration)
            <div class="card{{ $key >= $visibleRegistrations ? ' hidden' : '' }}">
                <div class="card-body">
                    <h4 class="card-title">{{ $registration->user->name }}</h4>
                    <p>Email: {{ $registration->user->email }}</p>
                    <p>Status: {{ $registration->accepted ? 'Accepted' : 'Pending' }}</p>
                    @if ($event->user_id === auth()->user()->id)
                        <form action="{{ route('event-registrations.accept', $registration) }}" method="POST" style="display: inline;">
                            @csrf
                            <button type="submit" class="btn btn-success btn-sm">Accept</button>
                        </form>
                        <form action="{{ route('event-registrations.refuse', $registration) }}" method="POST" style="display: inline;">
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm">Refuse</button>
                        </form>
                    @endif
                </div>
            </div> 
            <br>
        @endforeach
        @if ($event->registrations->count() > $visibleRegistrations)
            <a href="#" class="show-more-link">Show more</a>
        @endif
    @endif
</div>
{{-- @endsection --}}
</body>
</html>
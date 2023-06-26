<style>
    :root {
--main-color: #2196f3;
--main-color-alt: #005eac;
--main-transition: .5s;
--main-padding-top: 100px;
--main-padding-bottom: 100px;
--section-background: #ececec;
}
.specialButton2
{
position: relative;
background-color: #3881bd;
color: #fff;
text-decoration: none !important;
display: block;
width: 300px;
height: 45px;
min-width: 120px;
margin: 50px auto;
text-align: center;
line-height: 42px;
border-radius: 25px;
font-weight: 500;
font-size: 18px;
/* transition: .5s; */
z-index: 1;
overflow: hidden;
animation: moving 1s infinite ease;
}

/* .specialButton2 span:first-child
{
position: absolute;
z-index: 3;
left: 50%;
transform: translateX(-50%);
margin: auto;
transition: .8s;
width: 100%;
} */

.specialButton2 span:nth-of-type(2)
{
content: '';
position: absolute;
left: -12px;
top: 0;
width: 0;
height: 100%;
background-color: #000;
z-index: 2;
border-radius: 0;
transform: skew(50deg);
transition: .8s;
}

.specialButton2:hover span:nth-of-type(2)
{
width: 60%;
}

.specialButton2 span:nth-of-type(3)
{
content: '';
position: absolute;
right: -12px;
top: 0;
width: 0;
height: 100%;
background-color: #000;
z-index: 2;
border-radius: 0;
transform: skew(50deg);
transition: .8s;
}

.specialButton2:hover span:nth-of-type(3)
{
width: 60%;
}

.specialButton2:hover
{

transition-delay: .5s;
color: #3490dc !important;
/* font-weight: bold; */
}
/* End Special Button  2 */
@keyframes moving {
0%{
    transform: scale(1);
}
50%{
    transform: scale(1.02);
}

70%{
    transform: scale(1);
}

90%{
    transform: scale(1.02);
}

100%{
    transform: translateY(0);
}
}
/* ------------------------------- */
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


ul
{
    list-style: none;
    margin: 0;
    padding: 0;
}

a
{
    text-decoration: none;
}

.main-title
{
    margin: auto;
    margin-bottom: 80px;
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

/* ------------------------------- */
/* Start Testimonials */

.testimonials
{
    padding-top: var(--main-padding-top);
    padding-bottom: var(--main-padding-bottom);
    position: relative;
    background-color: var(--section-background);
    
}

.testimonials .container
{
    display: grid;
    grid-template-columns: repeat(auto-fill,minmax(300px,1fr));
    gap: 40px;
}

.room-types
{
    padding-top: var(--main-padding-top);
    padding-bottom: var(--main-padding-bottom);
    position: relative;
}

.room-types .box
{
    width: 100%;
    text-align: center;
    background-color: #eee;
    margin-bottom: 40px;
    color: var(--main-color-alt);
    padding-top: 20px;
}

.room-types .box h3
{
    margin: 0;
    margin-bottom: 20px;
    font-size: 20px;
    font-weight: bold;
}

.room-types .box a
{
    display: block;
    color: #fff;
    text-decoration: none;
    width: 100%;
    padding: 5px 0;
    background-color: var(--main-color-alt);
    margin-top: 10px ;
    font-weight: 600;
    transition: .3s;
}

.room-types .box a:hover
{
    background-color: var(--main-color);
}

.latest-bookings
{
    padding-top: var(--main-padding-top);
    padding-bottom: var(--main-padding-bottom);
    position: relative;
    background-color: var(--section-background);
}

.testimonials .box
{
    padding: 20px;
    background-color: #fff;
    border-radius: 6px;
    position: relative;
}

.testimonials .image img
{
    position: absolute;
    width: 100px;
    height: 100px;
    border-radius: 50%;
    right: -10px;
    top: -50px;
    border: 10px solid var(--section-background);
}

.testimonials h3.name
{
    margin: 0;  
    font-size: 20px;
}

.testimonials h5.work
{
    margin: 20px 0;
    font-size: 14px;
    padding: 0;
    color: var(--main-color-alt);
}

.testimonials .rating
{
    font-size: 20px;
}

.testimonials .rating i.fa-star.one,
.testimonials .rating i.fa-star.two,
.testimonials .rating i.fa-star.three
{
    color: #ffcd15;
}

.testimonials p
{
    color: #888;
    font-size: 16px;
    line-height: 25px;
}

/* End Testimonials */

</style>
@extends('temp.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <br><br>
            @if (auth()->check() && $event?->user_id === auth()->user()->id) 
            <a href="{{ route('speakers.create', ['event' => $event->id]) }}" class="btn btn-primary">Add Speaker</a>
            @endif
            <br><br>

            @if (auth()->check() && $event?->user_id === auth()->user()->id)
            <div class="main-title"  style="position: relative;left:70%;top:40px">
                <div >
                    <a href="{{ route('event-registrations.index', ['eventId' => $event->id]) }}" class="btn btn-primary">View Participants</a>
                </div>
            </div>
            @endif
         
            <h1>{{ $event->name }}</h1>
            <img src="{{ asset('images/' . $event->image) }}" alt="{{ $event->name }}" class="img-fluid">
            <p><strong>Category:</strong> {{ $event->category }}</p>
            <p><strong>Start Date:</strong> {{ $event->Start_date }}</p>
            <p><strong>End Date:</strong> {{ $event->End_date }}</p>
            <p><strong>Location:</strong> {{ $event->location }}</p>
            <p><strong>Description:</strong> {{ $event->description }}</p>
            <p><strong>Price:</strong> {{ $event->price ?? 'Free' }}</p>
            @if(auth()->check() && $event->user_id === auth()->user()->id)
                <a href="{{ route('events.edit', $event) }}" class="btn btn-primary">Edit</a>
            @endif
        </div>
        <div class="col-md-2" style="margin-left: 355px; margin-top: 100px;">
            <h1>Comments</h1>
            <br>
            @php $visibleComments = 3; @endphp
            @foreach ($event->comments as $key => $comment)
                <div class="card{{ $key >= $visibleComments ? ' hidden' : '' }}">
                    <div class="card-body">
                        <h4 class="card-title">{{ $comment->user->name }}: {{ $comment->comment }}</h4>
                    </div>
                </div>
                <br>
            @endforeach
            @if ($event->comments->count() > $visibleComments)
                <a href="#" class="show-more-link">Show more</a>
            @endif
        </div>
    
        
</div>
{{-- start registration --}}
@if (auth()->check() && $event?->user_id !== auth()->user()->id)
    @php
        $userRegistered = $event?->registrations()->where('user_id', auth()->user()->id)->exists();
    @endphp
    @if ($userRegistered)
        <button class="specialButton2" disabled>
            <span><i class="fa fa-calendar fa-fw"></i> Registered</span>
            <span></span>
            <span></span>
        </button>
    @else
        <form action="{{ route('event-registrations.store') }}" method="POST">
            @csrf
            <input type="hidden" name="event_id" value="{{ $event->id }}">
            <button type="submit" class="specialButton2">
                <span><i class="fa fa-calendar fa-fw"></i> Join Event</span>
                <span></span>
                <span></span>
            </button>
        </form>
    @endif
@endif


{{-- <div class="testimonials">
    <h2 class="main-title" style="font-size:25px;margin-bottom:100px">
                    Speakers
            </h2>
      <div class="container">
                              <div class="box">
                <div class="image">
                    <img src="http://ahmedsales.great-site.net/uploads/avatars/users/ng8uuPxwXbXoowkqOcMsVJI1u8G0xumju4xDTdQK.jpg" alt="">
                </div>   
               
                <h3 class="name"><b><a href="#">hhhhhhh</a></b></h3>
               
                
                <span class="rating">
                                          <i class="fa fa-star text-warning"></i>
                                          <i class="fa fa-star text-warning"></i>
                                          <i class="fa fa-star text-warning"></i>
                                          <i class="fa fa-star text-warning"></i>
                                      </span>
                  <p>حدث ممتاز</p>
                  <h4><b> <i class="fa fa-bookmark-o"></i> Event :</b> <a href="#">The basics to know guitar .</a></h4>
            </div>
          
   
                        </div>
</div> --}}
<br><br>
 <h2 class="main-title" style="font-size: 25px; margin-bottom: 100px">
        Speakers
    </h2>
<div class="testimonials">
   
    <div class="container">
        @foreach ($event->speaker as $speaker)
            <div class="box">
                <div class="image">
                    <img src="{{ asset('images/'.$speaker->image) }}" alt="">
                </div>   
                <h3 class="name"><b><a href="#">{{ $speaker->name }}</a></b></h3>
                {{-- <span class="rating">
                    @for ($i = 0; $i < $speaker->rating; $i++)
                        <i class="fa fa-star text-warning"></i>
                    @endfor
                </span> --}}
                <span class="rating">
                    <i class="fa fa-star text-warning"></i>
                    <i class="fa fa-star text-warning"></i>
                    <i class="fa fa-star text-warning"></i>
                    <i class="fa fa-star text-warning"></i>
                </span>
                 <p>{{$event->name}}</p>
                <h4>
                    <b><i class="fa fa-bookmark-o"></i> FeedBack:</b>
                    <a href="#">{{ $speaker->description }}</a>
                </h4>
            </div>
        @endforeach
    </div>
</div>



{{-- end registration --}}
<script>
    const showMoreLink = document.querySelector('.show-more-link');
    const hiddenCards = document.querySelectorAll('.card.hidden');

    if (showMoreLink) {
        showMoreLink.addEventListener('click', function (event) {
            event.preventDefault();

            hiddenCards.forEach(function (card) {
                card.classList.toggle('hidden');
            });

            showMoreLink.remove();
        });
    }
</script>

{{-- <script>
    const eventStartDate = new Date("{{ $event->Start_date }}"); 
    const joinEventButton = document.querySelector('.specialButton2');

    if (joinEventButton) {
        joinEventButton.addEventListener('click', function (event) {
            event.preventDefault();

            const currentDate = new Date();
            if (currentDate.toDateString() === eventStartDate.toDateString()) {
                alert("Today is the event day!");
            } else {
                alert("The event day has not arrived yet.");
            }
        });
    }
</script> --}}

@endsection

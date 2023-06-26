<!DOCTYPE html>
<html>
<head>
    <title>Laravel FullCalendar Tutorial Example</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
  
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" />
    <style>
       .container {
            position: relative;
            top: 100px;
       }
       .event {
            margin-bottom: 10px;
            padding: 10px;
            background-color: #f2f2f2;
            border: 1px solid #ccc;
       }
    </style>
    <link type="text/css" rel="stylesheet" href="{{ asset('front/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('front/css/font-awesome.min.css') }}">
</head>
<body>
<!-- Header -->
<header id="header" style="position:relative;bottom:100px">
         <!-- logo -->
         <div class="nav-logo" style="position: relative;top:100px;left:120px">
            <a href="index.html" class="logo"><img src="{{asset('front/img/logo-no-background.png')}}" alt=""  width='10px' height="40px"></a>
        </div>
        <!-- /logo -->
    <!-- Nav -->
    <nav id="nav" class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container justify-content-center">
            <!-- nav -->
            <ul class="nav-menu nav navbar-nav ">
                <li class="cat-1 nav-item"><a href="/">Home</a></li>
                <li class="cat-2 nav-item"><a href="/about">About</a></li>
                <li class="cat-3 nav-item"><a href="/calendar">Events</a></li>
                <li class="cat-4 nav-item"><a href="/contact">Contact</a></li>
                <li class="cat-5 nav-item"><a href="/faqs">FAQs</a></li>
            </ul>
            <!-- /nav -->
        </div>
    </nav>
    <!-- /Nav -->
</header>
<!-- /Header -->

<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <div id="calendar"></div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h3>Events</h3>
                    <div class="event-list">
                        <ul id="event-list">
                            <!-- Events will be dynamically populated here -->
                        </ul>
                    </div>
                </div>
            </div>
            <div class="card mt-4">
                <div class="card-body">
                    <h3>Search Events</h3>
                    <div class="form-group">
                        <label for="search-date">Select Date:</label>
                        <div class="input-group">
                            <input type="text" id="search-date" class="form-control" placeholder="YYYY-MM-DD" autocomplete="off">
                            <div class="input-group-append">
                                <button type="button" id="search-btn" class="btn btn-primary">Search</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

<script>
 $(document).ready(function () {
    var SITEURL = "{{ url('/') }}";
    var selectedDate = null;

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var calendar = $('#calendar').fullCalendar({
        editable: true,
        events: SITEURL + "/calendar/events",
        displayEventTime: false,
        eventRender: function (event, element, view) {
            if (event.allDay === 'true') {
                event.allDay = true;
            } else {
                event.allDay = false;
            }
        },
        selectable: true,
        selectHelper: true,
        select: function (start, end, allDay) {
            calendar.fullCalendar('unselect');
        },
        eventClick: function (event) {
            var eventList = $('#event-list');
            eventList.empty();

            var eventItem = $('<div>').addClass('event').text(event.title);
            eventList.append(eventItem);
        }
    });

function getEvents() {
    $.ajax({
        url: SITEURL + "/calendar/events",
        data: {
            date: selectedDate
        },
        type: "GET",
        success: function (response) {
            var eventList = $('#event-list');
            eventList.empty();

            var eventsFound = false;

            response.forEach(function(event) {
                var eventStartDate = moment(event.start).format('YYYY-MM-DD');
                var eventEndDate = moment(event.end).format('YYYY-MM-DD');
                if (selectedDate >= eventStartDate && selectedDate <= eventEndDate) {
                    var eventItem = $('<div>').addClass('event').text(event.title);
                    eventList.append(eventItem);
                    eventsFound = true;
                }
            });

            if (!eventsFound) {
                var noEventItem = $('<div>').text('No events found for this day');
                eventList.append(noEventItem);
            }
        },
        error: function (xhr, status, error) {
            console.log(error);
        }
    });
}



    $('#search-date').datepicker({
        format: 'yyyy-mm-dd',
        todayHighlight: true,
        autoclose: true
    }).on('changeDate', function(e) {
        selectedDate = moment(e.date).format('YYYY-MM-DD');
    });

    $('#search-btn').click(function () {
        if (selectedDate !== null) {
            getEvents();
        }
    });
});

</script>

</body>
</html>

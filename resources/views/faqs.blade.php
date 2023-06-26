<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    

    <style>
        /* faq.css */
    
    /* .container {
      max-width: 800px;
      margin: 0 auto;
      padding: 40px 20px;
    } */
    
    .frontend-content {
      text-align: center;
    }
    
    .main-title {
      margin-bottom: 50px;
      font-size: 24px;
      font-weight: bold;
    }
    
    .card {
      margin-bottom: 20px;
      border: none;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }
    
    .card-header {
      background-color: #f8f9fa;
      border-bottom: 1px solid #dee2e6;
    }
    
    .card-body {
      background-color: #fff;
      border-top: 1px solid #dee2e6;
      border-bottom: 1px solid #dee2e6;
    }
    
    .card-body p {
      margin-bottom: 0;
    }
    
    .btn-link {
      color: inherit;
      text-decoration: none;
    }
    
    .btn-link:hover {
      text-decoration: none;
    }
    
    .collapse.show {
      display: block;
    }
    
    .collapsed .icon {
      transform: rotate(-90deg);
      transition: transform 0.3s ease;
    }
    
    .icon {
      transform: rotate(0);
      transition: transform 0.3s ease;
    }
    
    .icon::before {
      content: "\f078";
      font-family: "Font Awesome 5 Free";
      font-weight: 900;
    }
    
    @media (max-width: 576px) {
      .main-title {
        font-size: 20px;
      }
    }
    </style>
    
</head>
<body>
@extends('temp.app')
<br><br><br>
@section('content')
    <div class="container">
        <div class="frontend-content">
          <h2 class="main-title" style="margin-bottom: 50px">
            Frequently Asked Questions (FAQs)
          </h2>

          <div id="accordion" style="margin-bottom: 80px">
            <div class="card">
              <div class="card-header" id="headingOne">
                <h5 class="mb-0">
                  <button
                    class="btn btn-link"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#collapse0"
                    aria-expanded="true"
                    aria-controls="collapse0"
                  >
                    Why is the booking approval delayed?
                  </button>
                </h5>
              </div>

              <div
                id="collapse0"
                class="collapse"
                aria-labelledby="headingOne"
                data-bs-parent="#accordion"
              >
                <div class="card-body">
                  Due to a high number of bookings or the administration being on vacation...
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header" id="headingTwo">
                <h5 class="mb-0">
                  <button
                    class="btn btn-link"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#collapse1"
                    aria-expanded="true"
                    aria-controls="collapse1"
                  >
                    How can I find out the schedule for upcoming events?
                  </button>
                </h5>
              </div>

              <div
                id="collapse1"
                class="collapse"
                aria-labelledby="headingTwo"
                data-bs-parent="#accordion"
              >
                <div class="card-body">
                  When you visit the website's News page, you will find a "Next Appointments" button. Clicking on it will display all the upcoming appointments for you.
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header" id="headingThree">
                <h5 class="mb-0">
                  <button
                    class="btn btn-link"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#collapse2"
                    aria-expanded="true"
                    aria-controls="collapse2"
                  >
                    How do I book an event?
                  </button>
                </h5>
              </div>

              <div
                id="collapse2"
                class="collapse"
                aria-labelledby="headingThree"
                data-bs-parent="#accordion"
              >
                <div class="card-body">
                  Simply select "Home" in the navigation bar, choose the event you're interested in, and on the event details page, you will find a "Join Event" button.
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
      
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
@endsection

</body>
</html>
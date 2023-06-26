@extends('temp.app')

@section('content')
<div class="container" id="containe">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <br>
            <h2 class="main-title" style="margin-bottom:30px">
                Contact Us
           </h2>
            @if(Session::has('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
            </div>
            @endif
            <form method="post" action="{{ route('contact.sendEmail') }}">
                @csrf
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" name="name" class="form-control" placeholder="Enter your name" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" name="email" class="form-control" placeholder="Enter your email" required>
                </div>
                <div class="form-group">
                    <label for="message">Message:</label>
                    <textarea name="message" class="form-control" placeholder="Enter your message" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary btn-block">
                    <i class="fa fa-phone fa-fw fa-lg"></i> Send
                </button>
            </form>
        </div>
    </div>
</div>

<style>
    /* contact.css */

#containe {
  margin-top: 50px;
  width: 100vw;
  position: relative;
  left:300px;
 
}

h2.main-title {
    margin-bottom: 30px;
    text-align: center;
}

.form-group {
    margin-bottom: 20px;
    
}

label {
    font-weight: bold;
    margin-bottom: 5px;
}

input[type="text"],
input[type="email"],
textarea {
    padding: 10px;
    border: none;
    border-radius: 4px;
    background-color: #f5f5f5;
    width: 100%;
}

.btn-primary {
    display: block;
    width: 100%;
    padding: 10px;
    border: none;
    border-radius: 4px;
    background-color: #007bff;
    color: #fff;
    font-weight: bold;
    text-align: center;
    text-transform: uppercase;
    transition: background-color 0.3s ease;
}

.btn-primary:hover {
    background-color: #0056b3;
}

.alert {
    margin-top: 20px;
    padding: 15px;
    border-radius: 4px;
    color: #155724;
    background-color: #d4edda;
    border: 1px solid #c3e6cb;
}

.form-group textarea {
    padding: 10px;
    border: none;
    border-radius: 4px;
    width: 100%;
    height: 150px; /* Adjust the height to your desired value */
}
/* Responsive styles */
@media (max-width: 768px) {
    #containe {
        margin-top: 50px;
        width: 90%;
        left: 5%;
    }
}

@media (max-width: 576px) {
    #containe {
        margin-top: 50px;
        width: 100%;
        left: 0;
    }
}

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
</style>
@endsection

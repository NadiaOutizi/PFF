@extends('temp.app')

@section('content')
    <div class="container">
        <h1>Edit Event</h1>
        <form action="{{ route('events.update', $event) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $event->name }}" required>
            </div>

            <div class="form-group">
                <label for="category">Category</label>
                <input type="text" name="category" id="category" class="form-control" value="{{ $event->category }}" required>
            </div>

            <div class="form-group">
                <label for="Start_date">Start Date</label>
                <input type="date" name="Start_date" id="Start_date" class="form-control" value="{{ $event->Start_date }}" required>
            </div>

            <div class="form-group">
                <label for="End_date">End Date</label>
                <input type="date" name="End_date" id="End_date" class="form-control" value="{{ $event->End_date }}" required>
            </div>
            <div class="form-group">
                <label for="location">Location</label>
                <input type="text" name="location" id="location" class="form-control" value="{{ $event->location }}" required>
            </div>
    
            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" name="image" id="image" class="form-control-file">
            </div>
    
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" class="form-control" rows="5" required>{{ $event->description }}</textarea>
            </div>
    
            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" name="price" id="price" class="form-control" value="{{ $event->price }}">
            </div>
    
            <button type="submit" class="btn btn-primary">Save changes</button>
        </form>
    </div>
    

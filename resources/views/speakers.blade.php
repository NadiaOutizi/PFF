@extends('temp.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">
                    Add Speaker
                </div>
                <div class="card-body">
                        <form action="{{ route('speakers.store', ['event' => $event->id]) }}" method="POST" enctype="multipart/form-data">

   
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required autofocus>
                            @error('name')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" rows="4">{{ old('description') }}</textarea>
                            @error('description')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="image">Image</label>
                            <input type="file" name="image" id="image" class="form-control-file @error('image') is-invalid @enderror">
                            @error('image')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <!-- Hidden field to store the event ID -->
                         <input type="hidden" name="event_id" value="{{ $event->id }}">
                         {{-- <div class="form-group">
                            <label for="event_id">Event</label>
                            <select name="event_id" id="event_id" class="form-control">
                                @foreach ($events as $event)
                                <option value="{{ $event->id }}">{{ $event->name }}</option>
                                @endforeach
                            </select><br><br> --}}
                        <button type="submit" class="btn btn-primary">Add Speaker</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
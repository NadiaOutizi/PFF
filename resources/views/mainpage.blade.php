<style>
    .text-danger {
    color: red;
}
</style>

@extends('temp.app')

@section('content')
<!-- section -->
  {{-- ADD EVENTS BUTTON BEGIN--}}
  <div class="section " >
    <!-- container -->
    @if(Auth::check())
    <button class="btn btn-primary " style="margin-left:100px" data-toggle="modal" data-target="#addEventModal">Add Event</button>
    <br><br> 
    @endif
   
    <!-- Add Event Modal -->
<div 
{{-- class="modal fade" --}}
class="modal {{ $errors->any() ? 'fade in' : 'fade' }}"
 id="addEventModal" 
 
 tabindex="-1" role="dialog" aria-labelledby="addEventModalLabel"
aria-hidden="true"
style="{{ $errors->any() ? 'display: block; padding-right: 17px;' : 
'display: none;' }}"
>
<div class="modal-dialog" role="document">
<div class="modal-content">
    <div class="modal-header">

        <h5 class="modal-title" id="addEventModalLabel">Add Event</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body" style="max-height: 400px; overflow-y: auto;">
        <!-- Add your form inputs here -->
        <form method="POST" action="{{ route('events.store') }}" enctype="multipart/form-data" novalidate>
            @csrf
            <div class="form-group">
                <label for="eventName">Event Name</label>
                <input name="name" type="text" class="form-control" id="eventName" placeholder="Enter event name">
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="eventName">Event Category</label>
                <input name="category" type="text" class="form-control" placeholder="Enter event category">
                @error('category')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label>Event Start Date</label>
                <input name="Start_date" type="date" class="form-control">
                @error('Start_date')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label>Event End Date</label>
                <input name="End_date" type="date" class="form-control">
                @error('End_date')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label>Event Location</label>
                <input name="location" type="text" class="form-control" placeholder="Enter event location">
                @error('location')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label>Event Price</label>
                <input name="price" type="text" class="form-control" placeholder="Enter event price if existed">
                @error('price')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label>Event Description</label>
                <textarea name="description" class="form-control" rows="3"></textarea>
                @error('description')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group" style="margin-left: 7px">
                <label>Image:</label>
                <input type="file" class="form-control-file" name="image">
                @error('image')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" id="saveChangesButton">Save changes</button>
                
                <button type="submit" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </form>
        
    </div>
</div>
</div>
</div>
{{-- ADD EVENTS BUTTON END--}}

  
    <div class="container" >
        <div class="row">
            @foreach ($events as $event)
                <div class="col-md-6">
                    <div class="post post-thumb">
                        <a class="post-img" href="{{ route('events.show', $event->id) }}"><img src="{{ asset('images/'.$event->image) }}" alt=""></a>
                        <div class="post-body">
                            @if($event->user_id == auth()->id())
                                <form action="{{ route('events.destroy', $event->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-primary">X</button>
                                </form>
                            @endif
                            <div class="post-meta">
                                <a class="post-category cat-2" href="category.html">{{ $event->category }}</a>
                                <span class="post-date">{{ $event->start_date }}</span>
                            </div>
                            <h3 class="post-title"><a href="{{ route('events.show', $event->id) }}">{{ $event->name }}</a></h3>
                        </div>
                    </div>
                    <div style="display: flex;">
                        <div class="post-actions" style="margin-right:40px">
                            @if ($event->likes()->where('user_id', auth()->id())->exists())
                                <form action="{{ route('events.unlike', $event) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-link"><i id="heart-icon-{{ $event->id }}" style="font-size:36px;cursor: pointer;" class="fa heart-icon is-liked ">&#xf08a;</i><p>{{ $event->likes()->count() }} likes</p></button>
                                </form>
                            @else
                                <form action="{{ route('events.like', $event) }}" method="POST" style="display: inline;">
                                    @csrf
                                    <button type="submit" class="btn btn-link"><i id="heart-icon-{{ $event->id }}" style="font-size:36px;cursor: pointer;" class="fa heart-icon is-liked">&#xf08a;</i><p>{{ $event->likes()->count() }} likes</p></button>
                                </form>
                            @endif
                        </div>
                        <div class="comments-section">
                            <div class="comments-header">
                                <h4 class="comments-title">{{ $event->comments->count() }} comments</h4>
                            </div>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#commentsModal{{ $event->id }}">View comments</button>
                        </div>
                       
                    </div>
                    <!-- Comments Modal -->
                    <div class="modal fade" id="commentsModal{{ $event->id }}" tabindex="-1" role="dialog" aria-labelledby="commentsModalLabel{{ $event->id }}" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="commentsModalLabel{{ $event->id }}">Comments for {{ $event->name }}</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="comments-list">
                                        @if ($event->comments->count())
                                        @foreach ($event->comments as $comment)
                                            <div class="comment">
                                                <div class="comment-body">
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <h5 class="comment-user">{{ $comment->user->name }}</h5>
                                                        <span class="comment-date">{{ $comment->created_at->diffForHumans() }}</span>
                                                    </div>
                                                    <p class="comment-text" style="display: inline;">{{ $comment->comment }}</p>
                                                    @if(auth()->check() && auth()->id() == $comment->user_id)
                                                        <form action="{{ route('comments.destroy', $comment->id) }}" method="POST" style="display: inline;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                                        </form>
                                                    @endif
                                                </div>
                                            </div>
                                        @endforeach
                                    @else
                                        <p>No comments yet.</p>
                                    @endif
                                </div>
                                <hr>
                        <div class="comment-form">
                            <form action="{{ route('comments.store', $event) }}" method="POST">
                                @csrf
                                <input type="hidden" name="event_id" value="{{ $event->id }}">
                                <div class="form-group">
                                    <label for="commentInput">Leave a comment:</label>
                                    <textarea class="form-control" id="commentInput" name="comment" rows="3" placeholder="Write your comment here"></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
                    </div>
                    </div>
                    
        @endforeach        
                                  
    
            <!-- /row -->
            {{-- RECENT EVENTS BEGIN --}}
        
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-title">
                            <h2>Recent Events</h2>
                        </div>
                    </div>
                    <div class="clearfix visible-md visible-lg"></div>
                </div>
                <!-- /row -->
        
                <!-- row -->
                <div class="row">
                    <div class="col-md-8">
                        <div class="row">
                            <div class="clearfix visible-md visible-lg"></div>
        @foreach ($LatestEvents as $l)
        
              <!-- post Content-->
              <div class="col-md-6">
                <div class="post">
                    <a class="post-img" href="blog-post.html"><img src="{{ asset('images/'.$l->image) }}"
                            alt=""></a>
                    <div class="post-body">
                        <div class="post-meta">
                            <a class="post-category cat-2" href="category.html">{{$l->category}}</a>
                            <span class="post-date">{{$l->Start_date}}</span>
                        </div>
                        <h3 class="post-title"><a href="blog-post.html">{{$l->name}}</a></h3>
                    </div>
                </div>
            </div>
            <!-- /post Content -->
        @endforeach
     
            {{-- RECENT EVENTS END --}}
    
            <!-- row -->
    
    {{-- MOST LIKED EVENTS BEGIN --}}
   
        <div class="clearfix visible-md visible-lg"></div>
    </div>
</div>
<div class="col-md-4">
    <!-- post widget Terkait -->
    <div class="aside-widget">
        <div class="section-title">
            <h2>Most Liked</h2>
        </div>
@foreach ($MostLikedEvents as $ev)

<div class="post post-widget">
<a class="post-img" href="blog-post.html"><img src="{{ asset('images/'.$ev->image) }}"
        alt=""></a>
<div class="post-body">
    <h3 class="post-title"><a href="blog-post.html">{{$ev->name}}</a></h3>
</div>

@endforeach
</div>
</div>
</div>   
</div>
<!-- /row Terkait -->
</div>
<!-- /container -->
</div>
   
    {{-- MOST LIKED EVENTS ENDS --}}
                     
    <!-- /section -->
    <script>
        const heartIcons = document.querySelectorAll('.is-liked');
        
        heartIcons.forEach((heartIcon) => {
          heartIcon.addEventListener('click', function() {
            if (heartIcon.style.color === 'red') {
              heartIcon.style.color = 'black';
            } else {
              heartIcon.style.color = 'red';
              heartIcon.style.fill = 'currentColor';
            }
          });
        });
        // -----------------------------------------------

      </script>
    
    
    
    @endsection
</div>



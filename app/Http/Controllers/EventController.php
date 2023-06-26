<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $MostLikedEvents = DB::table('events')
            ->select('events.id','events.name','events.image', DB::raw('COUNT(likes.id) as likes_count'))
            ->leftJoin('likes', 'events.id', '=', 'likes.event_id')
            ->groupBy('events.id','events.name','events.image')
            ->orderBy('likes_count', 'desc')
            ->limit(1)
            ->get();
        
        $eventsQuery = Event::query();
        if ($request->has('category')) {
            $category = $request->input('category');
            $eventsQuery->where('category', 'LIKE', "%$category%");
        }
        $events = $eventsQuery->get();
        
        $startOfWeek = now()->startOfWeek();
        $LatestEvents = Event::where('Start_date', '>', $startOfWeek)->paginate(4);
        return view('mainpage',compact('events', 'LatestEvents','MostLikedEvents'));
    }
    /**
     * Show the form for creating a new resource.
     */



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'category' => 'required|string',
            'Start_date' => 'required|date|after_or_equal:today',
            'End_date' => 'required|date|after_or_equal:Start_date',
            'location' => 'required',
            'image' => 'sometimes|required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            "description"=>"required|string",
            "price"=>'sometimes',
            
        ]);
    
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images'), $imageName);
    
        $event = new Event;
        $event->name = $validatedData['name'];
        $event->category = $validatedData['category'];
        $event->Start_date = $validatedData['Start_date'];
        $event->End_date = $validatedData['End_date'];
        $event->location = $validatedData['location'];
        $event->description = $validatedData['description'];
        $event->price = $validatedData['price'];
        // $event->price = $request->price;
        $event->image = $imageName;
        $event->user_id = auth()->user()->id;
        $event->save();
    
        return redirect()->back()->with('success', 'Event created successfully');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        $event->load('comments','speaker');
        return view('eventsPage', compact('event'));
    }
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        if($event->user_id !== auth()->user()->id) {
            abort(403, 'Unauthorized action.');
        }
    
        return view('editEvent', compact('event'));
    }
    /**
     * Update the specified resource in storage.
     */
/**
 * Update the specified resource in storage.
 */
public function update(Request $request, Event $event)
{
    if ($event->user_id != auth()->user()->id) {
        return redirect()->back()->with('error', 'You are not authorized to update this event.');
    }

    $validatedData = $request->validate([
        'name' => 'required|string',
        'category' => 'required|string',
        'Start_date' => 'required',
        'End_date' => 'required',
        'location' => 'required',
        'image' => 'sometimes|required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        "description"=>"required|string",
        'price' => 'nullable|string',
    ]);

    if ($request->hasFile('image')) {
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images'), $imageName);
        $event->image = $imageName;
    }

    $event->name = $validatedData['name'];
    $event->category = $validatedData['category'];
    $event->Start_date = $validatedData['Start_date'];
    $event->End_date = $validatedData['End_date'];
    $event->location = $validatedData['location'];
    $event->description = $validatedData['description'];
    $event->price = $validatedData['price'];

    $event->save();

    return redirect()->route('events.show', $event->id);
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        
        if(auth()->user()->id == $event->user_id){
            $event->delete();
            return redirect()->back()->with('success', 'Event deleted successfully');
        }
       
        return redirect()->back()->with('error', 'You are not authorized to delete this event');
    }

public function like(Event $event)
{
    if (!auth()->check()) {
        return redirect()->route('login')->with('warning', 'You need to be logged in to like events');
    }

    $event->likes()->create([
        'user_id' => auth()->id()
    ]);

    return back();
}
public function unlike(Event $event)
{
    auth()->user()->likedEvents()->detach($event);

    return back();
}

}


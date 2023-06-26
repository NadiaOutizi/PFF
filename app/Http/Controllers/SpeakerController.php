<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Speaker;
use Illuminate\Http\Request;

class SpeakerController extends Controller
{
 
    public function create($event)
    {
        $event = Event::findOrFail($event);
        return view('speakers', compact('event'));
    }

public function store(Request $request)
{
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        'event_id' => 'required|exists:events,id',
    ]);
    $imageName = time().'.'.$request->image->extension();
    $request->image->move(public_path('images'), $imageName);

    $speaker = new Speaker();
    $speaker->name = $validatedData['name'];
    $speaker->description = $validatedData['description'];
    $speaker->event_id = $request->input('event_id'); // Retrieve the event ID from the request
    $speaker->image = $imageName;
 
  

    $speaker->save();

    // Redirect the user to the show page of the associated event
    return redirect()->route('events.show', ['event' => $request->input('event_id')]);
}

}

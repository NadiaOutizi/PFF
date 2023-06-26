<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use App\Models\EventRegistration;

class EventRegistrationController extends Controller
{  
    public function index(Request $request)
    {
        $eventId = $request->route('eventId');
    
        // Retrieve the event data with its registrations
        $event = Event::with('registrations')->findOrFail($eventId);
    
        // Pass the event data to the view
        return view('participants', compact('event'));
    }
    
    
    public function accept(EventRegistration $eventRegistration)
    {
        $eventRegistration->accepted = true;
        $eventRegistration->save();

        return redirect()->back()->with('success', 'Registration accepted.');
    }

    public function refuse(EventRegistration $eventRegistration)
    {
        $eventRegistration->accepted = false;
        $eventRegistration->save();

        return redirect()->back()->with('success', 'Registration refused.');
    }
    public function store(Request $request)
{
    // Validate the request data
    $validatedData = $request->validate([
        'event_id' => 'required|exists:events,id',
    ]);

    // Create a new EventRegistration instance
    $eventRegistration = new EventRegistration();
    $eventRegistration->event_id = $validatedData['event_id'];
    $eventRegistration->user_id = auth()->user()->id;
    $eventRegistration->accepted = false; // Set initial acceptance status if needed
    $eventRegistration->save();

    return redirect()->back()->with('success', 'Event registration successful.');
}
}

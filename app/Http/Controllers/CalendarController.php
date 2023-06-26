<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;



class CalendarController extends Controller
{
    public function index()
    {
        return view('calendar');
    }


public function getEvents(Request $request)
{
    $events = Event::all()->map(function ($event) {
        return [
            'title' => $event->name,
            'start' => $event->Start_date,
            'end' => $event->End_date,
        ];
    });

    return response()->json($events);
}

}
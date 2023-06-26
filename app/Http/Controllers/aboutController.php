<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class aboutController extends Controller
{
    function index(){
        
        $eventCount = Event::count(); 
        $userCount = User::count(); 
        $currentDate = Carbon::now(); // Get the current date and time
        $newsCount = Event::where('start_date', '>', $currentDate)->count();
        $participantsCount = DB::table('event_registrations')->count();

        return view('about', compact('eventCount','userCount','newsCount','participantsCount'));
    }
}

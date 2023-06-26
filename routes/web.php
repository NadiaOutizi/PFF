<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\aboutController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SpeakerController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\FallbackController;
use App\Http\Controllers\EventRegistrationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', [EventController::class, 'index']);
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    Route::post('/events/{event}/likes', [EventController::class, 'toggleLike'])->name('events.likes');
    Route::post('/events/{event}/like', [EventController::class, 'like'])->name('events.like');
    Route::get('/events/{event}/unlike', [EventController::class, 'unlike'])->name('events.unlike');
    Route::delete('/events/{event}/unlike', [EventController::class, 'unlike'])->name('events.unlike');
    
});
Route::resource('events', EventController::class);
Route::post('/events/{event}/comments', [CommentController::class, 'store'])->name('comments.store');
Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');
Route::get('/contact', [ContactController::class,'show'])->name('contact.show');
Route::post('/contact', [ContactController::class,'sendEmail'])->name('contact.sendEmail');
Route::get('/faqs',function(){
    return view('faqs');
});
Route::get('/event-registrations', [EventRegistrationController::class, 'store'])->name('event-registrations.store');
Route::get('/event-registrations/{eventId}', [EventRegistrationController::class, 'index'])
    ->name('event-registrations.index');
Route::post('/event-registrations', [EventRegistrationController::class, 'store'])->name('event-registrations.store');
Route::post('/event-registrations/{eventRegistration}/accept', [EventRegistrationController::class, 'accept'])
    ->name('event-registrations.accept');
Route::post('/event-registrations/{eventRegistration}/refuse', [EventRegistrationController::class, 'refuse'])
    ->name('event-registrations.refuse');
Route::get('/about',[aboutController::class,'index']);
Route::get('/calendar', [CalendarController::class, 'index'])->name('calendar.index');
Route::get('/calendar/events', [CalendarController::class, 'getEvents'])->name('calendar.events');
Route::get('events/{event}/speakers/create', [SpeakerController::class, 'create'])->name('speakers.create');
Route::post('events/{event}/speakers', [SpeakerController::class, 'store'])->name('speakers.store');
Route::fallback(FallbackController::class); 

Route::get('/clear-error-session', function() {
    // Session::flush();
    return dd("hello");

    return response()->json(['message' => 'Error session cleared'], 200);
});
require __DIR__.'/auth.php';
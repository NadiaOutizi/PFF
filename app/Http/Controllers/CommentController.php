<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, Event $event)
{
    if (!auth()->check()) {
        return redirect()->route('login')->with('warning', 'You need to be logged in to like events');
    }
    $request->validate([
        'comment' => 'required|string',
    ]);

    $comment = new Comment;
    $comment->comment = $request->comment;
    $comment->event_id = $event->id;
    $comment->user_id = auth()->id();
    $comment->save();

    return redirect()->back();
}
public function destroy(Comment $comment)
{
    if(auth()->id() == $comment->user_id){
        $comment->delete();
        return redirect()->back()->with('success', 'Comment deleted successfully.');
    } else {
        return redirect()->back()->with('error', 'Unauthorized action.');
    }
}
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormMail;

class ContactController extends Controller
{
    public function show()
    {
        return view('contact');
    }

    public function sendEmail(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        $name = $request->input('name');
        $email = $request->input('email');
        $contenu = $request->input('message');

        Mail::to('nadiaoutizi2@gmail.com')->send(new ContactFormMail($name, $email, $contenu));

        return redirect()->back()->with('success', 'Your message has been sent!');
    }
}

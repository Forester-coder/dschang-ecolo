<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function showForm()
    {
        return view('contact');
    }

    public function send(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
        ];

        // Envoyer l'email à l'administrateur
        Mail::send('emails.contact', $data, function ($message) use ($data) {
            $message->to('admin@example.com') // Remplacez par l'email de l'administrateur
                ->subject('New Contact Message from ' . $data['name']);
        });

        return redirect()->route('contact.form')->with('success', 'Your message has been sent!');
    }
}

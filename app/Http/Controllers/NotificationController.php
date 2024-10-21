<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\Subscriber;
use App\Models\User;
use App\Notifications\SubscriberNotification;
use App\Notifications\UserNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class NotificationController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $notifications = Notification::all();
        return view('notifications.index', compact('notifications'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('notifications.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'message' => 'required|unique:notifications|max:255',
        ]);

        $notification = Notification::create($request->all());

        // Envoyer un email à tous les utilisateurs
        $users = User::all();
        foreach ($users as $user) {
            $user->notifications()->attach($notification->id);

            // Code pour envoyer l'email peut être ajouté ici
            $user->notify(new UserNotification($notification->message));
        }


        // Envoyer un email à tous les utilisateurs du systeme de newletter
        $subscribers = Subscriber::all();

        foreach ($subscribers as $subscriber) {
            $subscriber->notify(new SubscriberNotification($request->message));
        }

        return redirect()->route('notifications.index')
            ->with('success', 'Notification created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Notification $notification)
    {
        return view('notifications.show', compact('notification'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Notification $notification)
    {
        return view('notifications.edit', compact('notification'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Notification $notification)
    {
        $request->validate([
            'message' => 'required|unique:notifications,message,' . $notification->id . '|max:255',
        ]);

        $notification->update($request->all());

        return redirect()->route('notifications.index')
            ->with('success', 'Notification updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Notification $notification)
    {
        $notification->delete();

        return redirect()->route('notifications.index')
            ->with('success', 'Notification deleted successfully.');
    }
}

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Notification</h1>
        <p>ID: {{ $notification->id }}</p>
        <p>Message: {{ $notification->message }}</p>
        <a href="{{ route('notifications.index') }}" class="btn btn-primary">Back</a>
    </div>
@endsection

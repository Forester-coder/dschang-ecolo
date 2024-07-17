@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Notifications</h1>
        <a href="{{ route('notifications.create') }}" class="btn btn-primary my-2">Create Notification</a>

        @if ($message = Session::get('success'))
            <div class="alert alert-success my-2">
                <p>{{ $message }}</p>
            </div>
        @endif

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Message</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($notifications as $notification)
                    <tr>
                        <td>{{ $notification->id }}</td>
                        <td>{{ $notification->message }}</td>
                        <td>
                            <a href="{{ route('notifications.show', $notification->id) }}" class="btn btn-info">Show</a>
                            <a href="{{ route('notifications.edit', $notification->id) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('notifications.destroy', $notification->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ isset($notification) ? 'Edit' : 'Create' }} Notification</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ isset($notification) ? route('notifications.update', $notification->id) : route('notifications.store') }}" method="POST">
            @csrf
            @if(isset($notification))
                @method('PUT')
            @endif

            <div class="form-group">
                <label for="message">Message:</label>
                <input type="text" class="form-control" name="message" value="{{ isset($notification) ? $notification->message : '' }}">
            </div>

            <button type="submit" class="btn btn-primary my-2">{{ isset($notification) ? 'Update' : 'Create' }}</button>
        </form>
    </div>
@endsection

@extends('layouts.app')

@section('content')
    <div class="container mt-4 border border-4 border-success rounded">
        <h1 class="my-4">User Details</h1>
        <div class="card my-3">
            <div class="card-body">
                <h5 class="card-title">{{ $user->name }}</h5>
                <p class="card-text"><strong>Email:</strong> {{ $user->email }}</p>
                <p class="card-text"><strong>Phone:</strong> {{ $user->tel }}</p>
                <p class="card-text"><strong>Role:</strong> {{ $user->role ? $user->role->name : 'N/A' }}</p>
                <p class="card-text"><strong>Quartier:</strong> {{ $user->quartier ? $user->quartier->nom : 'N/A' }}</p>
                <a href="{{ route('users.index') }}" class="btn btn-primary">Back to Users</a>
            </div>
        </div>
    </div>
@endsection

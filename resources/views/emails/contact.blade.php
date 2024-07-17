@extends('layouts.app')


@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">New Contact Message</h1>
        <p><strong>Name:</strong> {{ $name }}</p>
        <p><strong>Email:</strong> {{ $email }}</p>
        <p><strong>Message:</strong></p>
        {{-- <p>{{ $message }}</p> --}}
    </div>
@endsection

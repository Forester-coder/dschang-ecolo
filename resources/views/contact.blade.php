@extends('layouts.app')


@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Contact Us</h1>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="row">
            <div class="col-md-6">
                <form action="{{ route('contact.send') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" id="name" name="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="message">Message:</label>
                        <textarea id="message" name="message" class="form-control" rows="4" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-success my-3">Send Message</button>
                </form>
            </div>
            
            <div class="col-md-6">
                <h3>Contact Information</h3>
                <ul class="list-unstyled">
                    <li><strong>Email:</strong> admin@example.com</li>
                    <li><strong>Phone:</strong> (123) 456-7890</li>
                    <li><strong>Address:</strong> 123 Main Street, City, Country</li>
                </ul>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    @include('components.footer')
@endsection

@extends('layouts.app')


@section('content')
    <div class="container mt-5">
        <div class="text-center">
            <h1 class="mb-4">Contacter Nous</h1>
        </div>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="row">
            <div class="col-md-6 border-end border-start border-5 border-success">
                <form action="{{ route('contact.send') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" id="name" name="name" class="form-control shadow-lg rounded-pill" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" class="form-control shadow-lg rounded-pill" required>
                    </div>
                    <div class="form-group">
                        <label for="message">Message:</label>
                        <textarea id="message" name="message" class="form-control shadow-lg " rows="4" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-success border-5 rounded-5 my-3">Send Message</button>
                </form>
            </div>

            <div class="col-md-6 border-end border-5 border-success">

                    <h3>Information de Contact </h3>
               
                <ul class="list-unstyled">
                    <li><strong>Email:</strong> admin@example.com</li>
                    <li><strong>Phone:</strong> (237) 652793130</li>
                    <li><strong>Address:</strong> 123 Main Street, Dschang, Cameroun</li>
                </ul>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    @include('components.footer')
@endsection

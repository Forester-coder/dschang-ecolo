@extends('layouts.app')

@section('content')
    <div class="container mt-4 border border-4 border-success rounded">

        <h1 class="my-4">Create User</h1>
        <form action="{{ route('users.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control"
                    required>
            </div>
            <div class="form-group">
                <label for="tel">Phone</label>
                <input type="number" name="tel" id="tel" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="role_id">Role</label>
                <select name="role_id" id="role_id" class="form-control">
                    <option value="">Select Role</option>
                    @foreach ($roles as $role)
                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="quartier_id">Quartier</label>
                <select name="quartier_id" id="quartier_id" class="form-control">
                    <option value="">Select Quartier</option>
                    @foreach ($quartiers as $quartier)
                        <option value="{{ $quartier->id }}">{{ $quartier->nom }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary my-3">Create</button>
        </form>
    </div>
@endsection

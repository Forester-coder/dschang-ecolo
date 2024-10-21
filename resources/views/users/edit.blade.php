@extends('layouts.app')

@section('content')
    <div class="container mt-4 border border-4 border-success rounded-5">
        <h1 class="my-4">Edit User</h1>
        <form action="{{ route('users.update', $user) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $user->name }}" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ $user->email }}"
                    required>
            </div>
            <div class="form-group">
                <label for="tel">Phone</label>
                <input type="number" name="tel" id="tel" class="form-control" value="{{ $user->tel }}"
                    required>
            </div>
            <div class="form-group">
                <label for="role_id">Role</label>
                <select name="role_id" id="role_id" class="form-control">
                    <option value="">Select Role</option>
                    @foreach ($roles as $role)
                        <option value="{{ $role->id }}" {{ $user->role_id == $role->id ? 'selected' : '' }}>
                            {{ $role->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="quartier_id">Quartier</label>
                <select name="quartier_id" id="quartier_id" class="form-control">
                    <option value="">Select Quartier</option>
                    @foreach ($quartiers as $quartier)
                        <option value="{{ $quartier->id }}" {{ $user->quartier_id == $quartier->id ? 'selected' : '' }}>
                            {{ $quartier->nom }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary my-3">Update</button>
        </form>
    </div>
@endsection

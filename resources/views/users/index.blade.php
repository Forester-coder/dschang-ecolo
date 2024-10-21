@extends('layouts.app')

@section('content')
    <div class="container mt-4 border border-4 border-success rounded-5">
        <h1 class="my-4">Users</h1>
        <form action="{{ route('users.index') }}" method="GET" class="form-inline mb-4 d-flex">
            <input type="text" name="search" placeholder="rechercher par le nom , l'email ou le telephone" value="{{ request('search') }}" class="form-control mr-2 rounded-5">
            <button type="submit" class="btn btn-success ms-2 rounded-5">Search</button>
        </form>
        <a href="{{ route('users.create') }}" class="btn btn-success mb-4 rounded-5">Create User</a>
        <table class="table table-striped border border-1 border-success rounded-5">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->tel }}</td>
                        <td>
                            <a href="{{ route('users.show', $user) }}" class="btn btn-info btn-sm">Show</a>
                            <a href="{{ route('users.edit', $user) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('users.destroy', $user) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

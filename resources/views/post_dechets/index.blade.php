@extends('layouts.app')

@section('content')
    <div class="container border border-4 border-success rounded">
        <h1>Liste des Post Dechets</h1>
        <a href="{{ route('post-dechets.create') }}" class="btn btn-primary">Ajouter un nouveau Post Dechet</a>

        @if(session('success'))
            <div class="alert alert-success mt-3">
                {{ session('success') }}
            </div>
        @endif

        <table class="table mt-3">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Contenu</th>
                    <th>Images</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($postDechets as $postDechet)
                    <tr>
                        <td>{{ $postDechet->id }}</td>
                        <td>{{ \Str::words($postDechet->contenu, 10, '...')  }}</td>
                        <td>
                            @foreach($postDechet->images as $image)
                                <img src="{{ asset('storage/' . $image->path) }}" alt="Image" width="50">
                            @endforeach
                        </td>
                        <td>
                            <a href="{{ route('post-dechets.show', $postDechet) }}" class="btn btn-info">Voir</a>
                            <a href="{{ route('post-dechets.edit', $postDechet) }}" class="btn btn-warning">Modifier</a>
                            <form action="{{ route('post-dechets.destroy', $postDechet) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

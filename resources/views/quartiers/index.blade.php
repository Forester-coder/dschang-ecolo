@extends('layouts.app')

@section('content')
<div class="container border border-4 border-success rounded">
    <h1>Quartiers</h1>
    <a href="{{ route('quartiers.create') }}" class="btn btn-primary">Créer un Quartier</a>
    @if(session('success'))
        <div class="alert alert-success mt-2">{{ session('success') }}</div>
    @endif
    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($quartiers as $quartier)
            <tr>
                <td>{{ $quartier->id }}</td>
                <td>{{ $quartier->nom }}</td>
                <td>{{ $quartier->description }}</td>
                <td>
                    <a href="{{ route('quartiers.show', $quartier->id) }}" class="btn btn-info">Voir</a>
                    <a href="{{ route('quartiers.edit', $quartier->id) }}" class="btn btn-warning">Modifier</a>
                    <form action="{{ route('quartiers.destroy', $quartier->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce quartier ?');">Supprimer</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

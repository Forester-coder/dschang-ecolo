@extends('layouts.app')

@section('content')
<div class="container border border-4 border-success rounded">
    <h1>Détails du Quartier</h1>
    <div class="card">
        <div class="card-header">
            {{ $quartier->nom }}
        </div>
        <div class="card-body">
            <h5 class="card-title">Description</h5>
            <p class="card-text">{{ $quartier->description }}</p>
        </div>
        <div class="card-footer">
            <a href="{{ route('quartiers.edit', $quartier->id) }}" class="btn btn-warning">Modifier</a>
            <form action="{{ route('quartiers.destroy', $quartier->id) }}" method="POST" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce quartier ?');">Supprimer</button>
            </form>
        </div>
    </div>
</div>
@endsection

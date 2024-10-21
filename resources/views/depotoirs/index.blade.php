@extends('layouts.app')

@section('content')
<div class="container border border-round border-5 border-success rounded-5">
    <div class="text-center">
        <h1>Liste des Dépotoirs</h1>
    </div>
    <a href="{{ route('depotoirs.create') }}" class="btn btn-success mb-3 rounded-5">Ajouter un Dépotoir</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Latitude</th>
                <th>Longitude</th>
                <th>Quartier</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($depotoirs as $depotoir)
            <tr>
                <td>{{ $depotoir->id }}</td>
                <td>{{ $depotoir->latitude }}</td>
                <td>{{ $depotoir->longitude }}</td>
                <td>{{ $depotoir->quartier ? $depotoir->quartier->nom : 'N/A' }}</td>
                <td>
                    <a href="{{ route('depotoirs.show', $depotoir) }}" class="btn btn-info rounded-5">Voir</a>
                    <a href="{{ route('depotoirs.edit', $depotoir) }}" class="btn btn-warning rounded-5">Modifier</a>
                    <form action="{{ route('depotoirs.destroy', $depotoir) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger rounded-5">Supprimer</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

@extends('layouts.app')

@section('content')
    <div class="container border border-5 border-success">
        <h1>Détails du Dépotoir</h1>
        <div>
            <strong>ID :</strong> {{ $depotoir->id }}
        </div>
        <div>
            <strong>Latitude :</strong> {{ $depotoir->latitude }}
        </div>
        <div>
            <strong>Longitude :</strong> {{ $depotoir->longitude }}
        </div>
        <div>
            <strong>Quartier :</strong> {{ $depotoir->quartier ? $depotoir->quartier->nom : 'N/A' }}
        </div>
        <a href="{{ route('depotoirs.index') }}" class="btn btn-secondary">Retour à la liste</a>
    </div>
@endsection

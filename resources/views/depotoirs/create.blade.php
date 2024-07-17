@extends('layouts.app')

@section('content')
<div class="container border border-5 border-success">
    <h1>Ajouter un Dépotoir</h1>
    <form action="{{ route('depotoirs.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="latitude">Latitude</label>
            <input type="text" name="latitude" id="latitude" class="form-control" value="{{ old('latitude') }}">
        </div>
        <div class="form-group">
            <label for="longitude">Longitude</label>
            <input type="text" name="longitude" id="longitude" class="form-control" value="{{ old('longitude') }}">
        </div>
        <div class="form-group">
            <label for="quartier_id">Quartier</label>
            <select name="quartier_id" id="quartier_id" class="form-control">
                <option value="">Sélectionnez un Quartier</option>
                @foreach($quartiers as $quartier)
                <option value="{{ $quartier->id }}" {{ old('quartier_id') == $quartier->id ? 'selected' : '' }}>{{ $quartier->nom }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary my-3">Ajouter</button>
    </form>
</div>
@endsection

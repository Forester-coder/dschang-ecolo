@extends('layouts.app')

@section('content')
<div class="container border border-5 border-success rounded-5">
    <div class="text-center">
        <h1>Modifier un Dépotoir</h1>
    </div>
    <form action="{{ route('depotoirs.update', $depotoir) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="latitude">Latitude</label>
            <input type="text" name="latitude" id="latitude" class="form-control" value="{{ old('latitude', $depotoir->latitude) }}">
        </div>
        <div class="form-group">
            <label for="longitude">Longitude</label>
            <input type="text" name="longitude" id="longitude" class="form-control" value="{{ old('longitude', $depotoir->longitude) }}">
        </div>
        <div class="form-group">
            <label for="quartier_id">Quartier</label>
            <select name="quartier_id" id="quartier_id" class="form-control">
                <option value="">Sélectionnez un Quartier</option>
                @foreach($quartiers as $quartier)
                <option value="{{ $quartier->id }}" {{ old('quartier_id', $depotoir->quartier_id) == $quartier->id ? 'selected' : '' }}>{{ $quartier->nom }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-success my-3 rounded-5">Mettre à jour</button>
    </form>
</div>
@endsection

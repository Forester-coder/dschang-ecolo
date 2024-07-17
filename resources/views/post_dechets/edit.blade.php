@extends('layouts.app')

@section('content')
    <div class="container border border-4 border-success rounded">
        <h1>Modifier le Post Dechet</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('post-dechets.update', $postDechet) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="contenu">Contenu</label>
                <textarea name="contenu" id="contenu" class="form-control">{{ old('contenu', $postDechet->contenu) }}</textarea>
            </div>
            <div class="form-group">
                <label for="user_id">Utilisateur (Optionnel)</label>
                <input type="text" name="user_id" id="user_id" class="form-control"
                    value="{{ old('user_id', $postDechet->user_id) }}">
            </div>
            <div class="form-group">
                <label for="images">Images</label>
                <input type="file" name="images[]" id="images" class="form-control" multiple>
            </div>
            <button type="submit" class="btn btn-primary my-3">Mettre à jour</button>
        </form>
    </div>
@endsection

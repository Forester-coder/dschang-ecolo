@extends('layouts.app')

@section('content')
    <div class="container border border-4 border-success rounded-5">
        <div class="text-center">
            <h1>Modifier le Post Dechet</h1>
        </div>

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
                <textarea name="contenu" id="contenu" class="form-control shadow-lg">{{ old('contenu', $postDechet->contenu) }}</textarea>
            </div>
            {{-- <div class="form-group">
                <label for="user_id">Utilisateur (Optionnel)</label>
                <input type="text" name="user_id" id="user_id" class="form-control"
                    value="{{ old('user_id', $postDechet->user_id) }}">
            </div> --}}
            <div class="form-group">
                <label for="images">Images</label>
                <input type="file" name="images[]" id="images" class="form-control shadow-lg" multiple>
            </div>
            <button type="submit" class="btn btn-success border-5 rounded-5 my-3">Mettre à jour</button>
        </form>
    </div>
@endsection

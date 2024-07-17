@extends('layouts.app')

@section('content')
    <div class="container mt-5 border border-4 border-success rounded">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <h2 class="card-title">Détails du Post Dechet</h2>

                <div class="card text-center my-3">
                    <div class="card-header bg-success text-white">
                        contenu du post
                    </div>
                    <div class="card-body">
                        <p class="card-text">{{ $postDechet->contenu }}</p>
                    </div>
                    <div class="card-footer text-body-secondary">
                        {{ $postDechet->created_at->diffForHumans() }}
                    </div>
                </div>

                @if ($postDechet->images->isEmpty())
                    <div class="alert alert-warning" role="alert">
                        Aucune image disponible.
                    </div>
                @else
                    <div class="card">
                        <div class="card-body">
                            {{-- <h3 class="card-title">Images</h3> --}}
                            <div class="row">
                                @foreach ($postDechet->images as $index => $image)
                                    <div class="col-md-4 col-sm-6 mb-4">
                                        <div class="card h-100">
                                            <img src="{{ asset('storage/' . $image->path) }}" class="card-img-top img-fluid"
                                                style="object-fit: cover; height: 200px;" alt="Image">
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif

                <a href="{{ route('index') }}" class="btn btn-secondary my-3">Retour</a>
            </div>
        </div>
    </div>
@endsection

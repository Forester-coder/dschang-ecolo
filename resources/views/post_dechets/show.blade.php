@extends('layouts.app')


@section('styles')
    <style>
        .contact-button {
            display: inline-flex;
            align-items: center;
            padding: 10px 20px;
            font-size: 16px;
            color: white;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            margin-right: 10px;
        }

        .whatsapp-button {
            background-color: #25D366;
        }

        .whatsapp-button img {
            width: 24px;
            height: 24px;
            margin-right: 10px;
        }

        .email-button {
            background-color: #007BFF;
        }

        .email-button img {
            width: 24px;
            height: 24px;
            margin-right: 10px;
        }
    </style>
@endsection

@section('content')
    <div class="container mt-5 border border-4 border-success rounded-5">

        <div class="">
            <div class="text-center">
                <h2 class="card-title">Détails du Post Dechet</h2>
            </div>

            <div class="card text-center my-3">
                <div class="card-header bg-success text-white">
                    contenu du post
                </div>
                <div class="card-body">
                    <p class="card-text">{{ $postDechet->contenu }}</p>
                </div>

                <div class="card-footer text-body-secondary">
                    @if ($postDechet->user->tel)
                        <a href="https://wa.me/{{ $postDechet->user->tel }}" class="btn contact-button whatsapp-button">
                            <img src="{{ asset('icon/icons8-whatsapp.gif') }}" alt="WhatsApp Icon">
                            Contacter {{ $postDechet->user->name }} sur WhatsApp
                        </a>
                    @else
                        <p>Numéro de téléphone non disponible</p>
                    @endif

                    @if ($postDechet->user->email)
                        <a href="mailto:{{ $postDechet->user->email }}" class="btn contact-button email-button">
                            <img src="{{ asset('icon/icons8-email-96.png') }}" alt="Email Icon">
                            Contacter {{ $postDechet->user->name }} par Email
                        </a>
                    @else
                        <p>Email non disponible</p>
                    @endif
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
            <div class="row my-3">
                <div class="col">

                    <a href="{{ route('index') }}" class="btn btn-secondary rounded-5">Retour</a>
                </div>
                <div class="col-auto">
                    @auth
                        @if (Auth::user()->id === $postDechet->user_id)
                            <div class="card-footer text-body-secondary">

                                <a href="{{ route('post-dechets.edit', $postDechet) }}" class="btn btn-warning rounded-5">Modifier</a>
                                <form action="{{ route('post-dechets.destroy', $postDechet) }}" method="POST"
                                    style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger rounded-5">Supprimer</button>
                                </form>
                            </div>
                        @endif
                    @endauth
                </div>
            </div>
        </div>

    </div>
@endsection

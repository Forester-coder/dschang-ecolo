@extends('layouts.app')

@section('title')
    index
@endsection

@section('styles')
    <style>
        .jumbotron {
            background-color: #f8f9fa;
            /* Couleur de fond personnalisée */
            padding: 2rem 1rem;
            border-radius: 0.3rem;
            text-align: center;
        }

        .jumbotron .display-4 {
            font-weight: 300;
        }

        .jumbotron p.lead {
            font-size: 1.25rem;
            font-weight: 300;
        }
    </style>
@endsection

@section('content')
    @if (session('success'))
        <div class="alert alert-success mt-3">
            {{ session('success') }}
        </div>
    @endif
    <div class="container">
        <div class="jumbotron p-5 mb-4 bg-light rounded-3">
            <div class="container-fluid py-5">
                <h1 class="display-4">Bienvenue sur la Plateforme de Gestion des Déchets de Dschang</h1>
                <p class="lead">Notre mission est de créer un environnement plus propre et plus sain pour tous les
                    habitants de Dschang en améliorant la gestion des déchets dans notre belle ville.</p>
                <hr class="my-4">
                <p>Explorez notre plateforme pour découvrir les initiatives locales, participer aux campagnes de
                    sensibilisation, et apprendre comment vous pouvez contribuer à une ville plus propre. Ensemble, nous
                    pouvons faire une différence !</p>
                <a class="btn btn-outline-success btn-lg" href="{{ route('apropos') }}" role="button">En savoir plus</a>
            </div>
        </div>
    </div>

    <div class="container border border-4 border-success rounded">

        <div class="text-center bg-success ">
            <h2 class="text-white">post des dechet recycleé</h2>
        </div>
        <div class="row p-3">
            @forelse ($postDechets as $postDechet)
                <div class="col-md-3 col-sm-6 mb-4">
                    <div class="card  rounded shadow-lg m-2" style="width: 18rem; height:20rem;">
                        @if ($postDechet->images->isEmpty())
                            <img src="{{ asset('images/1.jpg') }}" alt="">
                        @else
                            <a href="{{ route('post-dechets.show', $postDechet->id) }}">
                                <img src="{{ asset('storage/' . $postDechet->images[0]->path) }}"
                                    style="width: 18rem; height:13rem;" class="card-img-top" alt="...">
                            </a>
                        @endif
                        <div class="card-body">
                            {{-- <h5 class="card-title">Card title</h5> --}}
                            <p class="card-text">{{ \Str::words($postDechet->contenu, 1, '...') }}</p>
                            <p class="card-text"><small
                                    class="text-body-secondary">{{ $postDechet->created_at->diffForHumans() }}</small>
                            </p>
                        </div>
                    </div>
                </div>
            @empty
                <p>aucun post de dechet disponible</p>
            @endforelse
        </div>

        <div class="d-flex justify-content-center">
            {{ $postDechets->links() }}
        </div>

        <a class="btn btn-outline-success m-3 border-5" href="{{ route('post-dechets.create') }}">
            Faire un post
        </a>
    </div>

    <div class="container mt-5">
        <div class="card text-center m-0">
            <div class="card-header bg-success">
                <h5>Inscrivez-vous à notre Newsletter</h5>
            </div>
            <div class="card-body">
                <p class="card-text">Restez informé des dernières initiatives, événements et conseils sur la gestion des
                    déchets à Dschang.</p>
                <form action="{{ route('subscribe') }}" method="POST">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" placeholder="Votre adresse e-mail"
                            aria-label="Votre adresse e-mail" name="email" required>
                        <button class="btn btn-primary ms-2" type="submit">S'inscrire</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    @include('components.footer')
@endsection

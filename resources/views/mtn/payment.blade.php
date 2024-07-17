@extends('layouts.app')



@section('content')
    @php
        // par defaut dans la base de donnee le mode de paiement avec MTN aura l'ID "1"
        $moyenPaiement = 1;
    @endphp
    <div class="container py-3 border border-5 border-success rounded">

        <div class="logo d-flex justify-content-center">
            <img src="{{ asset('images/LogoMoMo.jpeg') }}" alt="logo de MoMo">
        </div>

        <form action="{{ route('mtn.payment.initiate') }}" id="form">

            <div class="mt-5">
                <label class="form-label" for="">Type de l'abonnement</label>
                <select name="type_abonnement" size="1" class="form-select">
                    @forelse ($typeAbonnements as $typeAbonnement)
                        <option value="{{ $typeAbonnement->id }}">{{ $typeAbonnement->nom }}</option>
                    @empty
                        <option value="">Aucun Type Abonnement Disponible</option>
                    @endforelse
                </select>
            </div>
            <div class="mb-3 mt-5">
                <label class="form-label" for="">Contact</label>
                <input class="form-control" type="text" name="contactAbonnement" id="contactA">
                <p id="erreurC" class="para"></p>
            </div>

            <div class="mt-5 mb-5 d-grid gap-2 col-1 mx-auto">
                <button class="btn btn-outline-success" type="submit">Effectuer le paiement </button>
            </div>
        </form>

    </div>
@endsection

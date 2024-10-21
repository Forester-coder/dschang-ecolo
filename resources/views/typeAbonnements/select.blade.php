@extends('layouts.app')


@section('content')
    <div class="p-5">
        {{--
        <div class="container mt-5  logo">
            <h1>Abonnez-vous</h1>
        </div> --}}

        <div class="container text-center p-5 border border-4 border-success rounded-5">
            <h2>Choisisez votre mode de paiement</h2>
            <div class="row">
                <div class="col col-lg-4 col-sm-12 col-md-12 logo">
                    <a href="{{route('mtn.payment.form')}}"><img src="{{ asset('images/LogoMoMo.jpeg') }}" alt="logo de Mobile Money"></a>
                </div>
                <div class="col col-lg-4 col-sm-12 col-md-12 logo">
                    <a href="PaiementOM.html"><img src="{{ asset('images/logoOM.png') }}" alt="logo de Orange Money"></a>
                </div>
                <div class="col col-lg-4 col-sm-12 col-md-12 logo">
                    <a href="PaiementVISA.html"><img src="{{ asset('images/VISA.png') }}" alt="logo de VISA"></a>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.app')



@section('content')
    <div class="container border border-4 border-success rounded-5">
        <div class="text-center">
            <h1 class="mx-auto ">Administration</h1>
        </div>
        <hr class="border border-5 border-success">

        <div class="row my-2 border-3">
            <div class="text-center">
                <h5 class="mx-auto ">Gestion des Entitees</h5>
            </div>
            <div class="col-sm-4 mb-3 mb-sm-0 ">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Gestion des utilisateur</h5>
                        <p class="card-text">Gerer le CRUD des utilisateur </p>
                        <a href="{{ route('users.index') }}" class="btn btn-success">Gerer le utilisateurs</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 mb-3 mb-sm-0 ">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Gestion des Depotoirs</h5>
                        <p class="card-text">Gerer le CRUD des Depotoirs </p>
                        <a href="{{ route('depotoirs.index') }}" class="btn btn-success">Gerer les depotoirs</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 mb-3 mb-sm-0 ">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Gestion des Quartiers</h5>
                        <p class="card-text">Gerer le CRUD des Quartiers </p>
                        <a href="{{ route('quartiers.index') }}" class="btn btn-success">Gerer les Quartiers</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 mb-3 mb-sm-0 my-2">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Gestion des Post Des Dechets</h5>
                        <p class="card-text">Gerer le CRUD des Post Des Dechets </p>
                        <a href="{{ route('post-dechets.index') }}" class="btn btn-success">Gerer les Post Des Dechets</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 mb-3 mb-sm-0 my-2">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Gestion des Notifications</h5>
                        <p class="card-text">Gerer le CRUD des Notifiations </p>
                        <a href="{{ route('notifications.index') }}" class="btn btn-success">Gerer les Notifications</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 mb-3 mb-sm-0 my-2">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Gestion des Abonnements</h5>
                        <p class="card-text">Gerer le CRUD des Abonnements</p>
                        <a href="{{ route('typeAbonnements.index') }}" class="btn btn-success">Gerer les Abonnements</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

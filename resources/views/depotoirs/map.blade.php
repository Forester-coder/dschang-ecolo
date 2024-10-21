<!-- resources/views/depotoirs/map.blade.php -->


@extends('layouts.app')

@section('title')
    Depotoirs Map
@endsection

@section('styles')
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine/dist/leaflet-routing-machine.css" />
    <style>
        #map {
            height: 500px;
            width: 100%;
        }
    </style>
@endsection

@section('content')
    <div class="container mt-5">
        <div class="text-center">
            <h1 class="mb-4">Liste des Depotoirs</h1>
        </div>
        <div id="map" class="border border-success border-5 rounded-5"></div>
    </div>

    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script src="https://unpkg.com/leaflet-routing-machine/dist/leaflet-routing-machine.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Coordonnées géographiques de Dschang, Cameroun
            var dschangCoords = [5.4478, 10.0537];
            var map = L.map('map').setView(dschangCoords, 13);

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);

            var depotoirs = @json($depotoirs);

            depotoirs.forEach(function(depotoir) {
                var position = [parseFloat(depotoir.latitude), parseFloat(depotoir.longitude)];
                L.marker(position, {
                    icon: L.icon({
                        iconUrl: '{{ asset('images/recycling-8707519_1920.png') }}',
                        iconSize: [30, 30],
                        iconAnchor: [15, 30]
                    })
                }).addTo(map).bindPopup("ID du dépotoir : " + depotoir.id);
            });

            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    var userPosition = [position.coords.latitude, position.coords.longitude];

                    // Vérifier si l'utilisateur est à Dschang (dans un rayon de 10 km)
                    var distanceToDschang = map.distance(userPosition, dschangCoords);
                    var radius = 10000; // 10 km

                    if (distanceToDschang <= radius) {
                        L.marker(userPosition, {
                            icon: L.icon({
                                iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-blue.png',
                                iconSize: [25, 41],
                                iconAnchor: [12, 41],
                                popupAnchor: [1, -34],
                                shadowSize: [41, 41]
                            })
                        }).addTo(map).bindPopup("Your Location");

                        map.setView(userPosition, 13);

                        // Afficher les itinéraires vers tous les dépotoirs
                        depotoirs.forEach(function(depotoir) {
                            var depotoirPosition = [parseFloat(depotoir.latitude), parseFloat(depotoir.longitude)];
                            L.Routing.control({
                                waypoints: [
                                    L.latLng(userPosition[0], userPosition[1]),
                                    L.latLng(depotoirPosition[0], depotoirPosition[1])
                                ],
                                routeWhileDragging: false,
                                createMarker: function() { return null; } // pour éviter les marqueurs automatiques
                            }).addTo(map);
                        });
                    } else {
                        alert("You are not in Dschang. Showing map centered on Dschang.");
                        map.setView(dschangCoords, 13);
                    }
                }, function() {
                    alert("client hors de la ville de dschang");
                });
            } else {
                alert("Geolocation is not supported by this browser.");
            }
        });
    </script>
@endsection

@section('footer')
    @include('components.footer')
@endsection



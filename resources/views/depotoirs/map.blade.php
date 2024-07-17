<!-- resources/views/depotoirs/map.blade.php -->


@extends('layouts.app')

@section('title')
    Depotoirs Map
@endsection

@section('styles')
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <style>
        #map {
            height: 500px;
            width: 100%;
        }
    </style>
@endsection

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Depotoirs Map</h1>
        <div id="map"></div>
    </div>

    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var map = L.map('map').setView([5.444, 10.058], 12);

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
                }).addTo(map).bindPopup("Depotoir").openPopup();;
            });

            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    var userPosition = [position.coords.latitude, position.coords.longitude];
                    L.marker(userPosition, {
                        icon: L.icon({
                            iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-blue.png',
                            iconSize: [25, 41],
                            iconAnchor: [12, 41],
                            popupAnchor: [1, -34],
                            shadowSize: [41, 41]
                        })
                    }).addTo(map).bindPopup("Your Location").openPopup();

                    map.setView(userPosition, 12);
                }, function() {
                    alert("Geolocation failed. Default map center is used.");
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

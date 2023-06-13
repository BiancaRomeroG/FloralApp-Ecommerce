@extends('layout')

@section('title', 'Nueva cuenta')

@section('content')
    <!-- Breadcrumb -->
    @include('components.breadcrumb')

    <!-- Register Area Start Here -->
    <form action="{{ route('register') }}" method="POST">
        @csrf
        <div class="login-register-area mt-no-text mb-4">
            <div class="container container-default-2 custom-area">
                <div class="row">
                    <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-custom">
                        <div class="login-register-wrapper">
                            <div class="section-content text-center mb-5">
                                <h2 class="title-4 mb-2">Crea una nueva cuenta</h2>
                                <p class="desc-content">Por favor rellene el formulario con sus datos</p>
                            </div>
                            <form action="#" method="post">
                                <h4 class="mb-3">Usuario</h4>
                                <div class="single-input-item mb-3">
                                    <input type="text" name="name" id="name" placeholder="Nombres">
                                </div>
                                <div class="single-input-item mb-3">
                                    <input type="text" name="lastName" id="lastName" placeholder="Apellidos">
                                </div>
                                <div class="single-input-item mb-3">
                                    <input type="email" name="email" id="email" placeholder="Email">
                                </div>
                                <div class="single-input-item mb-3">
                                    <input type="password" name="password" id="password" placeholder="Contraseña">
                                </div>
                                <div class="single-input-item mb-3">
                                    <input type="tel" name="phoneNumber" id="phoneNumber" placeholder="Telefono">
                                </div>

                                <h4 class="mb-3">Direcciones</h4>

                                <div class="single-input-item mb-3">
                                    <input type="text" name="address" id="address" placeholder="Ubicacion">
                                    <button type="button" id="searchBtn" class="btn flosun-button secondary-btn theme-color rounded-0">Buscar</button>
                                </div>

                                <div class="single-input-item mb-3">
                                    <input type="text" name="references" id="references" placeholder="Referencias">
                                </div>
                                <div class="single-input-item mb-3">
                                    <input type="hidden" name="city" id="city" placeholder="Ciudad">
                                </div>

                                <input type="hidden" id="lat" name="lat" value="">
                                <input type="hidden" id="lng" name="lng" value="">

                                <div id="map" class="mb-3" style="height: 400px;"></div>

                                <div class="single-input-item mb-3">
                                    <button type="submit"
                                        class="btn flosun-button secondary-btn theme-color rounded-0">Crear</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!-- Register Area End Here -->

    <!-- Error -->
    @if ($errors->any())
        <div class="alert alert-danger m-0">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Footer -->
    @include('components.footer')

    <script>
        // Initialize the map
        var map = L.map('map').setView([-17.7918548, -63.1703596], 12);

        // Add OpenStreetMap tile layer to the map
        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);

        var marker;

        // Handle the click event on the map to get coordinates and add a marker
        map.on('click', function(e) {
            var latitude = e.latlng.lat;
            var longitude = e.latlng.lng;

            console.log('Latitude:', latitude);
            console.log('Longitude:', longitude);

            // Set the latitude and longitude values in the hidden input fields
            document.getElementById('lat').value = latitude;
            document.getElementById('lng').value = longitude;

            // Remove the previous marker, if exists
            if (marker) {
                map.removeLayer(marker);
            }

            // Create a new marker at the clicked coordinates
            marker = L.marker([latitude, longitude]).addTo(map);

            // Reverse geocode the coordinates to get the address
            fetch('https://nominatim.openstreetmap.org/reverse?format=jsonv2&lat=' + latitude + '&lon=' + longitude)
                .then(function(response) {
                    return response.json();
                })
                .then(function(data) {
                    console.log('Address:', data)
                    if (data.address) {
                        var address = data.address;
                        var fullAddress = data.display_name;
                        document.getElementById('address').value = fullAddress;
                    }
                })
                .catch(function(error) {
                    console.error('Error:', error);
                });

        });

        // Handle the click event on the search button
        document.getElementById('searchBtn').addEventListener('click', function() {
            var address = document.getElementById('address').value;

            // Use the Nominatim API to geocode the address and get coordinates
            // Find the nearest location with the given address
            fetch('https://nominatim.openstreetmap.org/search?format=json&q=' + encodeURIComponent(address))
                .then(function(response) {
                    return response.json();
                })
                .then(function(data) {
                    console.log('Address:', data)
                    if (data.length > 0) {
                        var latitude = parseFloat(data[0].lat);
                        var longitude = parseFloat(data[0].lon);

                        // Set the geocoded latitude and longitude values in the hidden input fields
                        document.getElementById('lat').value = latitude;
                        document.getElementById('lng').value = longitude;

                        // Remove the previous marker, if exists
                        if (marker) {
                            map.removeLayer(marker);
                        }

                        // Create a new marker at the geocoded coordinates
                        marker = L.marker([latitude, longitude]).addTo(map);

                        // Pan the map to the geocoded location
                        map.panTo([latitude, longitude]);
                    }
                })
                .catch(function(error) {
                    console.error('Error:', error);
                });
        });
    </script>
@endsection

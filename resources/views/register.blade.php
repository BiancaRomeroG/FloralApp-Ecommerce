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
                                </div>
                                <div class="single-input-item mb-3">
                                    <input type="text" name="references" id="references" placeholder="Referencias">
                                </div>
                                <div class="single-input-item mb-3">
                                    <input type="text" name="city" id="city" placeholder="Ciudad">
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
        // Inicializa el mapa
        var map = L.map('map').setView([-17.7918548, -63.1703596], 12);

        // Agrega una capa de mosaico de OpenStreetMap al mapa
        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);

        var marker;

        // Maneja el evento de hacer clic en el mapa para obtener las coordenadas y agregar un marcador
        map.on('click', function(e) {
            var latitude = e.latlng.lat;
            var longitude = e.latlng.lng;

            console.log('Latitud:', latitude);
            console.log('Longitud:', longitude);

            // Establece los valores de latitud y longitud en los campos de entrada ocultos
            document.getElementById('lat').value = latitude;
            document.getElementById('lng').value = longitude;

            // Elimina el marcador anterior, si existe
            if (marker) {
                map.removeLayer(marker);
            }

            // Crea un nuevo marcador en las coordenadas clickeadas
            marker = L.marker([latitude, longitude]).addTo(map);
        });
    </script>
@endsection

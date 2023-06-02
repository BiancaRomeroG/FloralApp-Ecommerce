@extends('layout')

@section('title', 'Nueva cuenta')

@section('content')
    <!-- Header -->
    @include('components.header')

    <!-- Breadcrumb Area Start Here -->
    <div class="breadcrumbs-area position-relative">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <div class="breadcrumb-content position-relative section-content">
                        <h3 class="title-3">Nueva cuenta</h3>
                        <ul>
                            <li><a href="{{ route('home') }}">Home</a></li>
                            <li>Registro</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Area End Here -->

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
                                    <input type="password" name="password" id="password"  placeholder="Contraseña">
                                </div>
                                <div class="single-input-item mb-3">
                                    <input type="tel" name="phoneNumber" id="phoneNumber" placeholder="Telefono">
                                </div>
                                
                                <div class="single-input-item mb-3">
                                    <button class="btn flosun-button secondary-btn theme-color rounded-0">Crear</button>
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

@endsection

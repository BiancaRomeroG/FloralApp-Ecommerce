@extends('layout')

@section('title', 'Login')

@section('content')
    <!-- Header -->
    @include('components.header')

    <!-- Breadcrumb -->
    @include('components.breadcrumb')

    <!-- Login Area Start Here -->
    <form action="{{ route('login') }}" method="POST">
        @csrf
        <div class="login-register-area mt-no-text mb-4">
            <div class="container custom-area">
                <div class="row">
                    <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-custom">
                        <div class="login-register-wrapper">
                            <div class="section-content text-center mb-5">
                                <h2 class="title-4 mb-2">Login</h2>
                                <p class="desc-content">Por favor inicie usando su cuenta.</p>
                            </div>
                            <form action="#" method="post">
                                <div class="single-input-item mb-3">
                                    <input type="email" name="email" id="email" placeholder="Email"
                                        value="{{ old('email') }}">
                                </div>
                                <div class="single-input-item mb-3">
                                    <input type="password" name="password" id="password"
                                        placeholder="Ingrese su contraseña">
                                </div>
                                <div class="single-input-item mb-3">
                                    <div class="login-reg-form-meta d-flex align-items-center justify-content-between">
                                        <div class="remember-meta mb-3">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="rememberMe">
                                                <label class="custom-control-label" for="rememberMe">Recuerdame</label>
                                            </div>
                                        </div>
                                        <a href="#" class="forget-pwd mb-3">Contraseña olvidada?</a>
                                    </div>
                                </div>
                                <div class="single-input-item mb-3">
                                    <button type="submit"
                                        class="btn flosun-button secondary-btn theme-color rounded-0">Login</button>
                                </div>
                                <div class="single-input-item">
                                    <a href="{{ route('register') }}">Create una cuenta</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!-- Login Area End Here -->

    <!-- Success -->
    @if (session('success'))
        <div class="alert alert-success m-0">{{ session('success') }}</div>
    @endif

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

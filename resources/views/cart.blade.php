@extends('layout')

@section('title', 'Carrito')

@section('content')
    <!-- Header -->
    @include('components.header')

    <!-- Breadcrumb -->
    @include('components.breadcrumb')

    <!-- cart main wrapper start -->
    <div class="cart-main-wrapper mt-no-text mb-4">
        <div class="container custom-area">
            <div class="row">
                <div class="col-lg-12 col-custom">
                    <!-- Cart Table Area -->
                    <livewire:cart-items-table />

                </div>
            </div>

            <livewire:cart-total-table :shipping="$shipping" />
        </div>
    </div>
    <!-- cart main wrapper end -->

    <!-- Footer -->
    @include('components.footer')

@endsection

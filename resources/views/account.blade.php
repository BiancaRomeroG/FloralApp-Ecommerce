@php
    use Carbon\Carbon;
@endphp
@extends('layout')

@section('title', 'Mi cuenta')

@section('content')
    <!-- Header -->
    @include('components.header')

    <!-- Breadcrumb -->
    @include('components.breadcrumb')

    <!-- my account wrapper start -->
    <div class="my-account-wrapper mt-no-text mb-4">
        <div class="container container-default-2 custom-area">
            <div class="row">
                <div class="col-lg-12 col-custom">
                    <!-- My Account Page Start -->
                    <div class="myaccount-page-wrapper">
                        <!-- My Account Tab Menu Start -->
                        <div class="row">
                            <div class="col-lg-3 col-md-4 col-custom">
                                <div class="myaccount-tab-menu nav" role="tablist">
                                    <a href="#orders" data-bs-toggle="tab"><i class="fa fa-cart-arrow-down"></i> Ordenes de
                                        compra</a>
                                    <a href="#address-edit" data-bs-toggle="tab"><i class="fa fa-map-marker"></i>
                                        Direcciones</a>
                                    <a href="#account-info" data-bs-toggle="tab"><i class="fa fa-user"></i> Detalles de
                                        cuenta</a>
                                </div>
                            </div>
                            <!-- My Account Tab Menu End -->

                            <!-- My Account Tab Content Start -->
                            <div class="col-lg-9 col-md-8 col-custom">
                                <div class="tab-content" id="myaccountContent">
                                    <!-- Single Tab Content Start -->
                                    <div class="tab-pane fade" id="orders" role="tabpanel">
                                        <div class="myaccount-content">
                                            <h3>Ordenes</h3>
                                            <div class="myaccount-table table-responsive text-center">
                                                <table class="table table-bordered">
                                                    <thead class="thead-light">
                                                        <tr>
                                                            <th>Orden</th>
                                                            <th>Fecha</th>
                                                            <th>Total</th>
                                                            <th>Detalle</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @if (count($orders) > 0)
                                                            @foreach ($orders as $order)
                                                                <tr>
                                                                    <td>{{ $order['id'] }}</td>
                                                                    <td>{{ Carbon::parse($order['timestamp'])->format('M d, Y h:i') }}
                                                                    </td>
                                                                    <td>Bs. {{ $order['payment']['amount'] }}</td>
                                                                    <td><a href="{{ route('delivery.show', $order['id']) }}"
                                                                            class="btn flosun-button secondary-btn theme-color rounded-0">Ver
                                                                        </a>
                                                                </tr>
                                                            @endforeach
                                                        @else
                                                        @endif

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Single Tab Content End -->

                                    <!-- Single Tab Content Start -->
                                    <div class="tab-pane fade" id="payment-method" role="tabpanel">
                                        <div class="myaccount-content">
                                            <h3>Payment Method</h3>
                                            <p class="saved-message">You Can't Saved Your Payment Method yet.</p>
                                        </div>
                                    </div>
                                    <!-- Single Tab Content End -->

                                    <!-- Single Tab Content Start -->
                                    <div class="tab-pane fade" id="address-edit" role="tabpanel">
                                        <div class="myaccount-content">
                                            <h3>Direccion de entrega</h3>
                                            <address>
                                                <p><strong>{{ $location['locationName'] }}</strong></p>
                                                <p>{{ $location['address'] }}<br>
                                                    {{ $location['references'] }}</p>
                                                <p>{{ $location['city'] }}</p>
                                            </address>
                                            <a href="https://www.google.com/maps?q={{ $location['lat'] }},{{ $location['lng'] }}"
                                                class="btn flosun-button secondary-btn theme-color  rounded-0">Ver en
                                                mapa</a>

                                        </div>
                                    </div>
                                    <!-- Single Tab Content End -->

                                    <!-- Single Tab Content Start -->
                                    <div class="tab-pane fade" id="account-info" role="tabpanel">
                                        <div class="myaccount-content">
                                            <h3>Mis datos</h3>
                                            <div class="account-details-form">
                                                <form action="#">
                                                    <div class="row">
                                                        <div class="col-lg-6 col-custom">
                                                            <div class="single-input-item mb-3">
                                                                <label for="first-name" class="required mb-1">Nombre</label>
                                                                <input type="text" id="first-name"
                                                                    placeholder="First Name"
                                                                    value="{{ $customer['user']['name'] }}" />
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="col-lg-6
                                                                    col-custom">
                                                            <div class="single-input-item mb-3">
                                                                <label for="last-name"
                                                                    class="required mb-1">Apellido</label>
                                                                <input type="text" id="last-name" placeholder="Last Name"
                                                                    value="{{ $customer['user']['lastName'] }}" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="single-input-item mb-3">
                                                        <label for="email" class="required mb-1">Correo</label>
                                                        <input type="email" id="email" placeholder="Email Address"
                                                            value="{{ $customer['user']['email'] }}" />
                                                    </div>
                                                    <div class="single-input-item single-item-button">
                                                        <button
                                                            class="btn flosun-button secondary-btn theme-color  rounded-0">Editar</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div> <!-- Single Tab Content End -->
                                </div>
                            </div> <!-- My Account Tab Content End -->
                        </div>
                    </div> <!-- My Account Page End -->
                </div>
            </div>
        </div>
    </div>
    <!-- my account wrapper end -->


    <!-- Footer -->
    @include('components.footer')

@endsection

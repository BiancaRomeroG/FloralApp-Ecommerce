@extends('layout')

@section('title', 'Pago de orden')

@section('content')
    <!-- Header -->
    @include('components.header')

    <!-- Breadcrumb -->
    @include('components.breadcrumb')

    <!-- Checkout Area Start Here -->
    <div class="checkout-area mt-no-text">
        <div class="container custom-container">
            <form action="{{ route('checkout.show') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-lg-6 col-12 col-custom">
                        <div class="checkbox-form">
                            <h3>Datos tarjeta</h3>
                            <div class="row">
                                <div class="col-md-12 col-custom">
                                    <div class="checkout-form-list">
                                        <label>Propietario <span class="required">*</label>
                                        <input placeholder="" name="propietario" type="text">
                                    </div>
                                </div>
                                <div class="col-md-12 col-custom">
                                    <div class="checkout-form-list">
                                        <label>Numero tarjeta <span class="required">*</span></label>
                                        <input placeholder="" name="numero" type="text">
                                    </div>
                                </div>
                                <div class="col-md-6 col-custom">
                                    <div class="checkout-form-list">
                                        <label>Fecha <span class="required">*</span></label>
                                        <input placeholder="" name="fecha" type="text">
                                    </div>
                                </div>
                                <div class="col-md-6 col-custom">
                                    <div class="checkout-form-list">
                                        <label>CVV <span class="required">*</span></label>
                                        <input placeholder="" name="cvv" type="password">
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-6 col-12 col-custom">
                        <div class="your-order">
                            <h3>Orden</h3>
                            <div class="your-order-table table-responsive">
                                @if (count($cart) > 0)
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th class="cart-product-name">Producto</th>
                                                <th class="cart-product-total">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($cart as $product)
                                                <tr class="cart_item">
                                                    <td class="cart-product-name"> {{ $product['name'] }}<strong
                                                            class="product-quantity">
                                                            × {{ $product['quantity'] }}</strong></td>
                                                    <td class="cart-product-total text-center"><span class="amount">Bs.
                                                            {{ $product['quantity'] * $product['price'] }}</span>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr class="cart-subtotal">
                                                <th>Subtotal</th>
                                                <td class="text-center"><span class="amount">Bs.
                                                        {{ $subtotal }}</span></td>
                                            </tr>
                                            <tr class="cart-subtotal">
                                                <th>Envio</th>
                                                <td class="text-center"><span class="amount">Bs.
                                                        {{ $shipping }}</span></td>
                                            </tr>
                                            <tr class="order-total">
                                                <th>Total</th>
                                                <td class="text-center"><strong><span class="amount">Bs.
                                                            {{ $subtotal + $shipping }}</span></strong></td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                @else
                                    <p>No hay productos en el carrito</p>
                                @endif
                            </div>
                            <div class="payment-method">
                                <div class="payment-accordion">
                                    <div id="accordion">
                                        <div class="card">
                                            <div class="card-header" id="#payment-3">
                                                <h5 class="panel-title mb-3">
                                                    <a href="#" class="collapsed" data-bs-toggle="collapse"
                                                        data-bs-target="#collapseThree" aria-expanded="false"
                                                        aria-controls="collapseThree">
                                                        Tarjeta de credito
                                                    </a>
                                                </h5>
                                            </div>
                                            <div id="collapseThree" class="collapse" data-parent="#accordion">
                                                <div class="card-body mb-2 mt-2">
                                                    <p>Make your payment directly into our bank account. Please use your
                                                        Order
                                                        ID as the payment reference. Your order won’t be shipped until the
                                                        funds
                                                        have cleared in our account.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="order-button-payment">
                                        <button class="btn flosun-button secondary-btn black-color rounded-0 w-100">Pagar
                                            orden</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Checkout Area End Here -->

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

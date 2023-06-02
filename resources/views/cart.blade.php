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
                    <div class="cart-table table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="pro-thumbnail">Foto</th>
                                    <th class="pro-title">Producto</th>
                                    <th class="pro-price">Precio</th>
                                    <th class="pro-quantity">Cantidad</th>
                                    <th class="pro-subtotal">Total</th>
                                    <th class="pro-remove">Eliminar</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($cart) > 0)
                                    <ul>
                                        @foreach ($cart as $productId => $item)
                                            <tr>
                                                <td class="pro-thumbnail"><a href="#"><img class="img-fluid"
                                                            src="{{ $item['photo'] }}" alt="Product" /></a></td>
                                                <td class="pro-title"><a href="#">{{ $item['name'] }}</td>
                                                <td class="pro-price"><span>Bs. {{ $item['price'] }}</span></td>
                                                <td class="pro-quantity">
                                                    <div class="quantity">
                                                        <div class="cart-plus-minus">
                                                            <input class="cart-plus-minus-box"
                                                                value="{{ $item['quantity'] }}" type="number">
                                                            <div class="dec qtybutton">-</div>
                                                            <div class="inc qtybutton">+</div>
                                                            <div class="dec qtybutton"><i class="fa fa-minus"></i></div>
                                                            <div class="inc qtybutton"><i class="fa fa-plus"></i></div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="pro-subtotal">
                                                    <span>Bs. {{ $item['quantity'] * $item['price'] }}</span>
                                                </td>
                                                <td class="pro-remove">
                                                    <form action="{{ route('cart.remove', ['productId' => $productId]) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"><i class="lnr lnr-trash"></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </ul>
                                @else
                                    <tr>
                                        <td colspan="6">No hay productos en el carrito</td>
                                    </tr>
                                @endif

                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
            @if (count($cart) > 0)
                <div class="row">
                    <div class="col-lg-5 ml-auto col-custom">
                        <!-- Cart Calculation Area -->
                        <div class="cart-calculator-wrapper">
                            <div class="cart-calculate-items">
                                <h3>Total a pagar</h3>
                                <div class="table-responsive">
                                    <table class="table">
                                        <tr>
                                            <td>Sub Total</td>
                                            <td>Bs. {{ $subtotal }}</td>
                                        </tr>
                                        <tr>
                                            <td>Envio</td>
                                            <td>Bs. {{ $shipping }}</td>
                                        </tr>
                                        <tr class="total">
                                            <td>Total</td>
                                            <td class="total-amount">Bs. {{ $subtotal + $shipping }}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <a href="{{ route('checkout.show') }}"
                                class="btn flosun-button primary-btn rounded-0 black-btn w-100">Proceder
                                a pagar</a>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
    <!-- cart main wrapper end -->

    <!-- Footer -->
    @include('components.footer')

@endsection

@php
    use Carbon\Carbon;
@endphp

@extends('layout')

@section('title', 'Delivery')

@section('content')
    <!-- Header -->
    @include('components.header')

    <!-- Breadcrumb -->
    @include('components.breadcrumb')

    <!-- cart main wrapper start -->
    <div class="cart-main-wrapper mt-no-text">
        <div class="container custom-area">
            <div class="row">
                @if ($delivery == null)
                    <p class="text-center text-bold mb-5">Esta orden aun no fue aceptada por la empresa para el delivery</p>
                @else
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
                                        <th class="pro-subtotal">Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($delivery['order']['orderItems'] as $item)
                                        <tr>
                                            <td class="pro-thumbnail"><a href="#"><img class="img-fluid"
                                                        src="{{ $item['product']['photo'] }}" alt="Product" /></a></td>
                                            <td class="pro-title">{{ $item['product']['name'] }}</td>
                                            <td class="pro-price"><span>Bs. {{ $item['product']['price'] }}</span></td>
                                            <td class="pro-quantity">
                                                <div class="quantity"><span>{{ $item['quantity'] }}</span>
                                                </div>
                                            </td>
                                            <td class="pro-subtotal"><span>Bs.
                                                    {{ $item['product']['price'] * $item['quantity'] }}</span></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                @endif
            </div>
            @if ($delivery != null)
                <div class="row mb-4">
                    <div class="col-lg-5 ml-auto col-custom">
                        <!-- Cart Calculation Area -->
                        <div class="cart-calculator-wrapper">
                            <div class="cart-calculate-items">
                                <h3>Detalles del delivery</h3>
                                <div class="table-responsive">
                                    <table class="table">
                                        <tr>
                                            <td>Estado</td>
                                            @if ($delivery['status'] === 1)
                                                <td>Pendiente</td>
                                            @elseif ($delivery['status'] === 2)
                                                <td>En camino</td>
                                            @elseif ($delivery['status'] === 3)
                                                <td>Entregado</td>
                                            @elseif ($delivery['status'] === 4)
                                                <td>Cancelado</td>
                                            @endif
                                        </tr>
                                        <tr>
                                            <td>Vehiculo de entrega</td>
                                            <td>{{ $delivery['vehicle']['model'] }} {{ $delivery['vehicle']['color'] }}
                                                {{ $delivery['vehicle']['year'] }} {{ $delivery['vehicle']['plate'] }}</td>
                                        </tr>
                                        <tr>
                                            <td>Fecha salida</td>
                                            <td>{{ $delivery['startTime'] ? Carbon::parse($delivery['startTime'])->format('M d, Y h:i') : 'Sin definir' }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Fecha entrega</td>
                                            <td>{{ $delivery['startTime'] ? Carbon::parse($delivery['endTime'])->format('M d, Y h:i') : 'Sin definir' }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Precio delivery</td>
                                            <td>Bs. {{ $delivery['deliveryPrice'] }}</td>
                                        </tr>

                                        <tr class="total">
                                            <td>Total pagado</td>
                                            <td class="total-amount">Bs. {{ $delivery['order']['payment']['amount'] }}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
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

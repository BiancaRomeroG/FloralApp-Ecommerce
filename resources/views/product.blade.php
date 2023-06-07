@extends('layout')

@section('title', 'Producto')

@section('content')
    <!-- Header -->
    @include('components.header')

    <!-- Breadcrumb -->
    @include('components.breadcrumb')

    <!-- Single Product Main Area Start -->
    <div class="single-product-main-area">
        <div class="container container-default custom-area">
            <div class="row">
                <div class="col-lg-5 offset-lg-0 col-md-8 offset-md-2 col-custom">
                    <div class="product-details-img">
                        <div class="single-product-thumb swiper-container gallery-thumbs mt-0">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <img src="{{ $product['photo'] }}" alt="Product">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 col-custom">
                    <div class="product-summery position-relative">
                        <div class="product-head mb-3">
                            <h2 class="product-title">{{ $product['name'] }}</h2>
                        </div>
                        <div class="price-box mb-2">
                            <span class="regular-price">Bs. {{ $product['price'] }}</span>
                            <span class="old-price"><del>Bs. {{ $product['price'] + 20 }}</del></span>
                        </div>
                        <div class="product-rating mb-3">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-o"></i>
                        </div>
                        <p class="desc-content mb-5">{{ $product['description'] }}</p>
                        <div class="quantity-with_btn mb-5">
                            <div class="quantity">
                                <div class="cart-plus-minus">
                                    <input class="cart-plus-minus-box" value="0" type="text">
                                    <div class="dec qtybutton">-</div>
                                    <div class="inc qtybutton">+</div>
                                </div>
                            </div>
                            <div class="add-to_cart">
                                <a class="btn product-cart button-icon flosun-button dark-btn" href="cart.html">Añadir al
                                    carrito</a>
                            </div>
                        </div>
                        <div class="social-share mb-4">
                            <span>Compartir :</span>
                            <a href="#"><i class="fa fa-facebook-square facebook-color"></i></a>
                            <a href="#"><i class="fa fa-twitter-square twitter-color"></i></a>
                            <a href="#"><i class="fa fa-linkedin-square linkedin-color"></i></a>
                            <a href="#"><i class="fa fa-pinterest-square pinterest-color"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-no-text">
                <div class="col-lg-12 col-custom">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active text-uppercase" id="home-tab" data-bs-toggle="tab" href="#connect-1"
                                role="tab" aria-selected="true">Descripcion</a>
                        </li>
                    </ul>
                    <div class="tab-content mb-text" id="myTabContent">
                        <div class="tab-pane fade show active" id="connect-1" role="tabpanel" aria-labelledby="home-tab">
                            <div class="desc-content">
                                <p class="mb-3">
                                    Presentamos un florero exquisito y versátil que seguramente cautivará todas las miradas.
                                    Este elegante jarrón blanco, disponible también en los fascinantes tonos negro y azul,
                                    es el complemento perfecto para realzar la belleza de tus flores favoritas.

                                    Confeccionado con cristal de alta calidad, su diseño sofisticado resalta la delicadeza y
                                    la elegancia de cada detalle. Su forma curva y armoniosa crea un equilibrio visual
                                    perfecto, mientras que su acabado brillante le otorga un toque de distinción.

                                    En su interior, el florero acoge con gracia y elegancia a una docena de tulipanes,
                                    flores emblemáticas de la primavera que simbolizan el amor y la belleza. Estas
                                    maravillas naturales despliegan una amplia paleta de colores, desde los blancos puros y
                                    delicados, hasta los negros enigmáticos y los azules vibrantes como el cielo.

                                    Ya sea que lo coloques en el centro de una mesa, en una repisa o en cualquier espacio
                                    que desees realzar, este florero con sus hermosos tulipanes será el foco de atención y
                                    brindará una atmósfera de elegancia y serenidad a tu hogar u oficina.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Single Product Main Area End -->

    <!-- Footer -->
    @include('components.footer')

@endsection

@extends('layout')

@section('title', 'Inicio')

@section('content')
    <!-- Header -->
    @include('components.header')

    <!-- Slider/Intro Section Start -->
    <div class="intro11-slider-wrap section-2">
        <div class="intro11-slider swiper-container">
            <div class="swiper-wrapper">
                <div class="intro11-section swiper-slide slide-5 slide-bg-1 bg-position">
                    <!-- Intro Content Start -->
                    <div class="intro11-content-2 text-center">
                        <h1 class="different-title">Muestra amor</h1>
                        <h2 class="title text-white">Regala unas flores</h2>
                        <a href="product-details.html" class="btn flosun-button  secondary-btn theme-color rounded-0">Comprar
                            ahora</a>
                    </div>
                    <!-- Intro Content End -->
                </div>
                <div class="intro11-section swiper-slide slide-6 slide-bg-1 bg-position">
                    <!-- Intro Content Start -->
                    <div class="intro11-content-2 text-center">
                        <h1 class="different-title">Bienvenido</h1>
                        <h2 class="title">Flores en tendencia 2023</h2>
                        <a href="product-details.html"
                            class="btn flosun-button  secondary-btn theme-color rounded-0">Comprar ahora</a>
                    </div>
                    <!-- Intro Content End -->
                </div>
            </div>
            <!-- Slider Navigation -->
            <div class="home1-slider-prev swiper-button-prev main-slider-nav"><i class="lnr lnr-arrow-left"></i></div>
            <div class="home1-slider-next swiper-button-next main-slider-nav"><i class="lnr lnr-arrow-right"></i></div>
            <!-- Slider pagination -->
            <div class="swiper-pagination"></div>
        </div>
    </div>
    <!-- Slider/Intro Section End -->
    <!-- Shop Collection Start Here -->
    <div class="shop-collection-area gray-bg pt-no-text pb-no-text">
        <div class="container custom-area">
            <div class="row mb-30">
                <div class="col-md-6 col-custom">
                    <div class="collection-content">
                        <div class="section-title text-left">
                            <span class="section-title-1">Flores para</span>
                            <h3 class="section-title-3 pb-0">Cumpleaños y regalos</h3>
                        </div>
                        <div class="desc-content">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                                labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                        </div>
                        <a href="shop.html" class="btn flosun-button secondary-btn rounded-0">Comprar ahora</a>
                    </div>
                </div>
                <div class="col-md-6 col-custom">
                    <!--Single Banner Area Start-->
                    <div class="single-banner hover-style">
                        <div class="banner-img">
                            <a href="#">
                                <img src="assets/images/collection/1-1.jpg" alt="">
                                <div class="overlay-1"></div>
                            </a>
                        </div>
                    </div>
                    <!--Single Banner Area End-->
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-custom order-2 order-md-1">
                    <!--Single Banner Area Start-->
                    <div class="single-banner hover-style">
                        <div class="banner-img">
                            <a href="#">
                                <img src="assets/images/collection/1-2.jpg" alt="">
                                <div class="overlay-1"></div>
                            </a>
                        </div>
                    </div>
                    <!--Single Banner Area End-->
                </div>
                <div class="col-md-6 col-custom order-1 order-md-2">
                    <div class="collection-content">
                        <div class="section-title text-left">
                            <span class="section-title-1">Flores para</span>
                            <h3 class="section-title-3 pb-0">Bodas</h3>
                        </div>
                        <div class="desc-content">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                                labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                        </div>
                        <a href="shop.html" class="btn flosun-button secondary-btn rounded-0">Comprar ahora</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Shop Collection End Here -->
    <!--Product Area Start-->
    <div class="product-area mt-text-3">
        <div class="container custom-area-2 overflow-hidden">
            <div class="row">
                <!--Section Title Start-->
                <div class="col-12 col-custom">
                    <div class="section-title text-center mb-30">
                        <span class="section-title-1">Los mas vendidos</span>
                        <h3 class="section-title-3">Productos destacados</h3>
                    </div>
                </div>
                <!--Section Title End-->
            </div>
            <div class="row product-row">
                <div class="col-12 col-custom">
                    <div class="product-slider swiper-container anime-element-multi">
                        <div class="swiper-wrapper">
                            @php
                                $chunks = array_chunk($data, 2);
                            @endphp

                            @foreach ($chunks as $chunk)
                                <div class="single-item swiper-slide">
                                    @foreach ($chunk as $product)
                                        <!--Single Product Start-->
                                        <div class="single-product position-relative mb-30">
                                            <div class="product-image">
                                                <a class="d-block"
                                                    href="{{ route('product.show', ['id' => $product['id']]) }}">
                                                    <img src="{{ $product['photo'] }}" alt=""
                                                        class="product-image-1 w-100"
                                                        onerror="this.onerror=null; this.src='assets/images/product/1.jpg';">

                                                </a>
                                                <div class="add-action d-flex flex-column position-absolute">
                                                    <a href="" title="Compare">
                                                        <i class="lnr lnr-sync" data-toggle="tooltip" data-placement="left"
                                                            title="Compare"></i>
                                                    </a>
                                                    <a href="" title="Add To Wishlist">
                                                        <i class="lnr lnr-heart" data-toggle="tooltip" data-placement="left"
                                                            title="Wishlist"></i>
                                                    </a>
                                                    <a href="#exampleModalCenter" title="Quick View" data-bs-toggle="modal"
                                                        data-bs-target="#exampleModalCenter">
                                                        <i class="lnr lnr-eye" data-toggle="tooltip" data-placement="left"
                                                            title="Quick View"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="product-content">
                                                <div class="product-title">
                                                    <h4 class="title-2"> <a
                                                            href="{{ route('product.show', ['id' => $product['id']]) }}">{{ $product['name'] }}</a>
                                                    </h4>
                                                </div>
                                                <div class="product-rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-o"></i>
                                                </div>
                                                <div class="price-box">
                                                    <span class="regular-price ">Bs. {{ $product['price'] }}</span>
                                                </div>
                                                <livewire:add-to-cart-button :product="$product" />
                                            </div>
                                        </div>
                                        <!--Single Product End-->
                                    @endforeach
                                </div>
                            @endforeach
                        </div>
                        <!-- Slider pagination -->
                        <div class="swiper-pagination default-pagination"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Product Area End-->
    <!-- Banner Area Start Here -->
    <div class="banner-area mt-text-3">
        <div class="container custom-area">
            <div class="row">
                <div class="col-md-6 col-custom">
                    <!--Single Banner Area Start-->
                    <div class="single-banner hover-style mb-30">
                        <div class="banner-img">
                            <a href="#">
                                <img src="assets/images/banner/1-1.jpg" alt="">
                                <div class="overlay-1"></div>
                            </a>
                        </div>
                    </div>
                    <!--Single Banner Area End-->
                </div>
                <div class="col-md-6 col-custom">
                    <!--Single Banner Area Start-->
                    <div class="single-banner hover-style mb-30">
                        <div class="banner-img">
                            <a href="#">
                                <img src="assets/images/banner/1-3.jpg" alt="">
                                <div class="overlay-1"></div>
                            </a>
                        </div>
                    </div>
                    <!--Single Banner Area End-->
                </div>
            </div>
        </div>
    </div>
    <!-- Banner Area End Here -->

    <!-- Modal -->
    <div class="modal flosun-modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <button type="button" class="close close-button" data-bs-dismiss="modal" aria-label="Close">
                    <span class="close-icon" aria-hidden="true">x</span>
                </button>
                <div class="modal-body">
                    <div class="container-fluid custom-area">
                        <div class="row">
                            <div class="col-md-6 col-custom">
                                <div class="modal-product-img">
                                    <a class="w-100" href="#">
                                        <img class="w-100" src="assets/images/product/large-size/1.jpg" alt="Product">
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-6 col-custom">
                                <div class="modal-product">
                                    <div class="product-content">
                                        <div class="product-title">
                                            <h4 class="title">Product dummy name</h4>
                                        </div>
                                        <div class="price-box">
                                            <span class="regular-price ">$80.00</span>
                                            <span class="old-price"><del>$90.00</del></span>
                                        </div>
                                        <div class="product-rating">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            <span>1 Review</span>
                                        </div>
                                        <p class="desc-content">we denounce with righteous indignation and dislike men who
                                            are so beguiled and demoralized by the charms of pleasure of the moment, so
                                            blinded by desire, that they cannot foresee the pain and trouble that are bound
                                            to ensue; and equal blame bel...</p>
                                        <form class="d-flex flex-column w-100" action="#">
                                            <div class="form-group">
                                                <select class="form-control nice-select w-100">
                                                    <option>S</option>
                                                    <option>M</option>
                                                    <option>L</option>
                                                    <option>XL</option>
                                                    <option>XXL</option>
                                                </select>
                                            </div>
                                        </form>
                                        <div class="quantity-with-btn">
                                            <div class="quantity">
                                                <div class="cart-plus-minus">
                                                    <input class="cart-plus-minus-box" value="0" type="text">
                                                    <div class="dec qtybutton">-</div>
                                                    <div class="inc qtybutton">+</div>
                                                    <div class="dec qtybutton"><i class="fa fa-minus"></i></div>
                                                    <div class="inc qtybutton"><i class="fa fa-plus"></i></div>
                                                </div>
                                            </div>
                                            <div class="add-to_btn">
                                                <a class="btn product-cart button-icon flosun-button dark-btn"
                                                    href="cart.html">Add to cart</a>
                                                <a class="btn flosun-button secondary-btn rounded-0"
                                                    href="wishlist.html">Add to wishlist</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scroll to Top Start -->
    <a class="scroll-to-top" href="#">
        <i class="lnr lnr-arrow-up"></i>
    </a>
    <!-- Scroll to Top End -->

    <!-- Footer -->
    @include('components.footer')

@endsection

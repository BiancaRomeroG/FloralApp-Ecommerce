@extends('layout')

@section('title', 'Tiendas')

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
                                    <img src="{{ $store['logo'] }}" alt="Product">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 col-custom">
                    <div class="product-summery position-relative">
                        <div class="product-head mb-3">
                            <h2 class="product-title">{{ $store['name'] }}</h2>
                        </div>
                        <div class="product-rating mb-3">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                        </div>
                        <p class="desc-content mb-5">Fundada en 2023, somos una empresa que vende las flores mas hibridas de
                            Santa Cruz de la Sierra</p>
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
                            <a class="nav-link text-uppercase active" id="branches-tab" data-bs-toggle="tab" role="tab"
                                aria-selected="true" onclick="changeTab('branches')">Sucursales</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-uppercase" id="catalogs-tab" data-bs-toggle="tab" role="tab"
                                aria-selected="false" onclick="changeTab('catalogs')">Catálogos</a>
                        </li>
                    </ul>
                    <div class="tab-content mb-text" id="myTabContent">
                        <div class="tab-pane fade show active" id="branches" role="tabpanel"
                            aria-labelledby="branches-tab">
                            <div class="size-tab table-responsive-lg">
                                <h4 class="title-3 mb-4">Lista de sucursales</h4>
                                <table class="table border">
                                    <tbody>
                                        @foreach ($store['branches'] as $branch)
                                            <tr>
                                                <td class="cun-name"><span>{{ $branch['name'] }}</span></td>
                                                <td>{{ $branch['phoneNumber'] }}</td>
                                                <td><a
                                                        href="https://www.google.com/maps?q={{ $branch['branchLocation']['lat'] }},{{ $branch['branchLocation']['lng'] }}">{{ $branch['branchLocation']['address'] }}</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="catalogs" role="tabpanel" aria-labelledby="catalogs-tab">
                            <div class="size-tab table-responsive-lg">
                                <h4 class="title-3 mb-4">Lista de catalogos disponibles</h4>
                                <table class="table border">
                                    <tbody>
                                        @foreach ($store['catalogs'] as $catalog)
                                            <tr>
                                                <td class="cun-name"><a
                                                        href="{{ route('catalog.show', $catalog['id']) }}">{{ $catalog['name'] }}</a>
                                                </td>
                                                <td>{{ $catalog['description'] }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <script>
                function changeTab(tabId) {
                    var tabContent = document.getElementsByClassName('tab-pane');
                    var tabs = document.getElementsByClassName('nav-link');

                    for (var i = 0; i < tabContent.length; i++) {
                        if (tabContent[i].id === tabId) {
                            tabContent[i].classList.add('show', 'active');
                        } else {
                            tabContent[i].classList.remove('show', 'active');
                        }
                    }

                    for (var i = 0; i < tabs.length; i++) {
                        if (tabs[i].id === tabId + '-tab') {
                            tabs[i].classList.add('active');
                        } else {
                            tabs[i].classList.remove('active');
                        }
                    }
                }
            </script>

        </div>
    </div>
    <!-- Single Product Main Area End -->

    <!--Product Area Start-->
    <div class="product-area mt-text-3">
        <div class="container custom-area-2 overflow-hidden">
            <div class="row">
                <!--Section Title Start-->
                <div class="col-12 col-custom">
                    <div class="section-title text-center mb-30">
                        <span class="section-title-1">Los Mas Populares</span>
                        <h3 class="section-title-3">Productos Destacados</h3>
                    </div>
                </div>
                <!--Section Title End-->
            </div>
            <div class="row product-row">
                <div class="col-12 col-custom">
                    <div class="product-slider swiper-container anime-element-multi">
                        <div class="swiper-wrapper">
                            @php
                                $chunks = array_chunk($products, 2);
                            @endphp

                            @foreach ($chunks as $chunk)
                                {{-- <div class="single-item swiper-slide"> --}}
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
                                {{-- </div> --}}
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

    <!-- Footer -->
    @include('components.footer')

@endsection

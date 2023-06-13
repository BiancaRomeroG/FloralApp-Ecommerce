@extends('layout')

@section('title', 'Catalogo')

@section('content')
    <!-- Header -->
    @include('components.header')

    <!-- Breadcrumb -->
    @include('components.breadcrumb')


    <!-- Shop Main Area Start Here -->
    <div class="shop-main-area">
        <div class="container container-default custom-area">
            <div class="row ">
                <div class="col-12 col-custom widget-mt">
                    <h3 class="my-3">{{ $catalog['name'] }}</h3>
                    <!--shop toolbar start-->
                    <div class="shop_toolbar_wrapper mb-30">
                        <div class="shop_toolbar_btn">
                            <button data-role="grid_3" type="button" class="active btn-grid-3" title="Grid"><i
                                    class="fa fa-th"></i></button>
                            <button data-role="grid_list" type="button" class="btn-list" title="List"><i
                                    class="fa fa-th-list"></i></button>
                        </div>
                        <div class="shop-select">
                            <form class="d-flex flex-column w-100" action="#">
                                <div class="form-group">
                                    <select class="form-control nice-select w-100">
                                        <option selected value="1">Alfabeticamente, A-Z</option>
                                    </select>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!--shop toolbar end-->
                    <!-- Shop Wrapper Start -->
                    <div class="row shop_wrapper grid_3">
                        @foreach ($catalog['catalogProducts'] as $catalogProduct)
                            <div class="col-md-6 col-sm-6 col-lg-4 col-custom product-area">
                                <div class="product-item">
                                    <div class="single-product position-relative mr-0 ml-0">
                                        <div class="product-image">
                                            <a class="d-block"
                                                href="{{ route('product.show', $catalogProduct['product']['id']) }}">
                                                <img src="{{ $catalogProduct['product']['photo'] }}" alt=""
                                                    class="product-image-1 w-100"
                                                    onerror="this.onerror=null; this.src='assets/images/brand/1.jpg';">
                                            </a>
                                        </div>
                                        <div class="product-content">
                                            <div class="product-title">
                                                <h4 class="title-2"> <a
                                                        href="{{ route('product.show', $catalogProduct['product']['id']) }}">{{ $catalogProduct['product']['name'] }}</a>
                                                </h4>
                                            </div>
                                            <div class="product-rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <!-- Shop Wrapper End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Shop Main Area End Here -->


    <!-- Footer -->
    @include('components.footer')

@endsection

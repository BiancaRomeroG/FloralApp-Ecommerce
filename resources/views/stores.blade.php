@extends('layout')

@section('title', 'Tiendas')

@section('content')
    <!-- Header -->
    @include('components.header')

    <!-- Breadcrumb -->
    @include('components.breadcrumb')

    <!-- Shop Main Area Start Here -->
    <div class="shop-main-area">
        <div class="container container-default custom-area">
            <div class="row flex-row-reverse">
                <div class="col-lg-9 col-12 col-custom widget-mt">
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
                                        <option selected value="1">Alphabetically, A-Z</option>
                                        <option value="2">Sort by popularity</option>
                                        <option value="3">Sort by newness</option>
                                        <option value="4">Sort by price: low to high</option>
                                        <option value="5">Sort by price: high to low</option>
                                        <option value="6">Product Name: Z</option>
                                    </select>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!--shop toolbar end-->
                    <!-- Shop Wrapper Start -->
                    <div class="row shop_wrapper grid_3">
                        @foreach ($data as $store)
                            <div class="col-md-6 col-sm-6 col-lg-4 col-custom product-area">
                                <div class="product-item">
                                    <div class="single-product position-relative mr-0 ml-0">
                                        <div class="product-image">
                                            <a class="d-block" href="">
                                                <img src="{{ $store['logo'] }}" alt="" class="product-image-1 w-100"
                                                    onerror="this.onerror=null; this.src='assets/images/brand/1.jpg';">
                                            </a>
                                            <div class="add-action d-flex flex-column position-absolute">
                                                <a href="compare.html" title="Compare">
                                                    <i class="lnr lnr-sync" data-toggle="tooltip" data-placement="left"
                                                        title="Compare"></i>
                                                </a>
                                                <a href="wishlist.html" title="Add To Wishlist">
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
                                                <h4 class="title-2"> <a href="product-details.html">{{ $store['name'] }}</a>
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
                <div class="col-lg-3 col-12 col-custom">
                    <!-- Sidebar Widget Start -->
                    <aside class="sidebar_widget widget-mt">
                        <div class="widget_inner">
                            <div class="widget-list widget-mb-1">
                                <h3 class="widget-title">Buscar</h3>
                                <div class="search-box">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Busca una tienda"
                                            aria-label="Busca una tienda">
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary" type="button">
                                                <i class="fa fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="widget-list widget-mb-1">
                                <h3 class="widget-title">Menu Categories</h3>
                                <!-- Widget Menu Start -->
                                <nav>
                                    <ul class="mobile-menu p-0 m-0">
                                        <li class="menu-item-has-children"><a href="#">Birthday Boqutets</a>
                                            <ul class="dropdown">
                                                <li><a href="#">Aster</a></li>
                                                <li><a href="#">Aubrieta</a></li>
                                                <li><a href="#">Basket of Gold</a></li>
                                            </ul>
                                        </li>
                                        <li class="menu-item-has-children"><a href="#">Funeral Flowers</a>
                                            <ul class="dropdown">
                                                <li><a href="#">Cleome</a></li>
                                                <li><a href="#">Columbine</a></li>
                                                <li><a href="#">Coneflower</a></li>
                                                <li><a href="#">Corepsis</a></li>
                                            </ul>
                                        </li>
                                        <li class="menu-item-has-children"><a href="#">Interior Decor</a>
                                            <ul class="dropdown">
                                                <li><a href="#">Calendula</a></li>
                                                <li><a href="#">Castor Bean</a></li>
                                                <li><a href="#">Catmint</a></li>
                                                <li><a href="#">Chives</a></li>
                                            </ul>
                                        </li>
                                        <li class="menu-item-has-children"><a href="#">Custom Orders</a>
                                            <ul class="dropdown">
                                                <li><a href="#">Lily</a></li>
                                                <li><a href="#">Rose</a></li>
                                                <li><a href="#">Sunflower</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </nav>
                                <!-- Widget Menu End -->
                            </div>
                            <div class="widget-list widget-mb-1">
                                <h3 class="widget-title">Filtro de precio</h3>
                                <!-- Widget Menu Start -->
                                <form action="#">
                                    <div id="slider-range"></div>
                                    <button type="submit">Filtro</button>
                                    <input type="text" name="text" id="amount" />
                                </form>
                                <!-- Widget Menu End -->
                            </div>
                            <div class="widget-list widget-mb-3">
                                <h3 class="widget-title">Tags</h3>
                                <div class="sidebar-body">
                                    <ul class="tags">
                                        <li><a href="#">Rose</a></li>
                                        <li><a href="#">Sunflower</a></li>
                                        <li><a href="#">Tulip</a></li>
                                        <li><a href="#">Lily</a></li>
                                        <li><a href="#">Smart</a></li>
                                        <li><a href="#">Modern</a></li>
                                        <li><a href="#">Gift</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </aside>
                    <!-- Sidebar Widget End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Shop Main Area End Here -->

    <!-- Footer -->
    @include('components.footer')

@endsection

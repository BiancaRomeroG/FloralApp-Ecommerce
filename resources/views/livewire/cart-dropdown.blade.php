<div>
    <a href="#" class="minicart-btn toolbar-btn">
        <i class="fa fa-shopping-cart"></i>
        <span class="cart-item_count">{{ count($cartItems) }}</span>
    </a>
    <div class="cart-item-wrapper dropdown-sidemenu dropdown-hover-2">
        @foreach ($cartItems as $productId => $item)
            <div class="single-cart-item">
                <div class="cart-img">
                    <a href="cart.html"><img src="{{ $item['photo'] }}" alt=""
                            onerror="this.onerror=null; this.src='assets/images/product/1.jpg';"></a>
                </div>
                <div class="cart-text">
                    <h5 class="title"><a href="cart.html">{{ $item['name'] }}</a></h5>
                    <div class="cart-text-btn">
                        <div class="cart-qty">
                            <span>{{ $item['quantity'] }}×</span>
                            <span class="cart-price">Bs. {{ $item['price'] }}</span>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        <div class="cart-price-total d-flex justify-content-between">
            @if (count($cartItems) > 0)
                <h5>Total :</h5>
                <h5>Bs. {{ $cartTotal }}</h5>
            @else
                <p>No hay productos en el carrito</p>
            @endif
        </div>
        <div class="cart-links d-flex justify-content-between">
            <a class="btn product-cart button-icon flosun-button dark-btn" href="{{ route('cart') }}">Ver carrito</a>
            <a class="btn flosun-button secondary-btn rounded-0" href="{{ route('checkout') }}">Pagar</a>
        </div>
    </div>
</div>

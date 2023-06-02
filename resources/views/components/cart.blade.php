@php
    $cartItems = session('cart', []);
    
    $cartTotal = 0;
    foreach ($cartItems as $productId => $item) {
        $cartTotal += $item['quantity'] * $item['price'];
    }
    
@endphp

<li class="minicart-wrap">
    <a href="#" class="minicart-btn toolbar-btn">
        <i class="fa fa-shopping-cart"></i>
        <span class="cart-item_count">{{ count($cartItems) }}</span>
    </a>
    <div class="cart-item-wrapper dropdown-sidemenu dropdown-hover-2">
        @foreach ($cartItems as $productId => $item)
            <div class="single-cart-item">
                <div class="cart-img">
                    <a href="cart.html"><img src="{{ $item['photo'] }}" alt=""></a>
                </div>
                <div class="cart-text">
                    <h5 class="title"><a href="cart.html">{{ $item['name'] }}</a></h5>
                    <div class="cart-text-btn">
                        <div class="cart-qty">
                            <span>{{ $item['quantity'] }}×</span>
                            <span class="cart-price">Bs. {{ $item['price'] }}</span>
                        </div>
                        <button type="button"><i class="ion-trash-b"></i></button>
                    </div>
                </div>
            </div>
        @endforeach
        <div class="cart-price-total d-flex justify-content-between">
            <h5>Total :</h5>
            <h5>Bs. {{ $cartTotal }}</h5>
        </div>
        <div class="cart-links d-flex justify-content-between">
            <a class="btn product-cart button-icon flosun-button dark-btn" href="{{ route('cart.show') }}">Ver
                carrito</a>
            <a class="btn flosun-button secondary-btn rounded-0" href="{{ route('checkout.show') }}">Pagar</a>
        </div>
    </div>
</li>

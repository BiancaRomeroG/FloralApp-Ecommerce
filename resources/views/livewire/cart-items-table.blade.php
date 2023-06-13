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
                            <td class="pro-thumbnail"><a href="{{ route('product.show', $productId) }}"><img
                                        class="img-fluid" src="{{ $item['photo'] }}" alt="Product"
                                        onerror="this.onerror=null; this.src='assets/images/product/1.jpg';" /></a>
                            </td>
                            <td class="pro-title"><a href="{{ route('product.show', $productId) }}">{{ $item['name'] }}
                            </td>
                            <td class="pro-price"><span>Bs. {{ $item['price'] }}</span></td>
                            <td class="pro-quantity">
                                <div style="display: flex; align-items: center;" class="quantity-box">
                                    <button wire:click="decreaseQuantity({{ $productId }})"
                                        style="padding: 5px 10px;"><i class="fa fa-minus"
                                            aria-hidden="true"></i></button>
                                    <input style="width: 50px; text-align: center;" class="quantity-input"
                                        value="{{ $item['quantity'] }}" type="number" min="1" disabled>
                                    <button wire:click="increaseQuantity({{ $productId }})"
                                        style="padding: 5px 10px;"><i class="fa fa-plus"
                                            aria-hidden="true"></i></button>
                                </div>
                            </td>
                            <td class="pro-subtotal">
                                <span>Bs. {{ $item['quantity'] * $item['price'] }}</span>
                            </td>
                            <td class="pro-remove">
                                <button wire:click="removeFromCart({{ $productId }})"><i
                                        class="lnr lnr-trash"></i></button>
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

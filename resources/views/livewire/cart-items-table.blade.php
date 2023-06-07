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
                            <td class="pro-thumbnail"><a href="#"><img class="img-fluid" src="{{ $item['photo'] }}"
                                        alt="Product"
                                        onerror="this.onerror=null; this.src='assets/images/product/1.jpg';" /></a>
                            </td>
                            <td class="pro-title"><a href="#">{{ $item['name'] }}</td>
                            <td class="pro-price"><span>Bs. {{ $item['price'] }}</span></td>
                            <td class="pro-quantity">
                                <div class="quantity">
                                    <div class="cart-plus-minus">
                                        <input class="cart-plus-minus-box" value="{{ $item['quantity'] }}"
                                            type="number" min="1">
                                        <div>
                                            <button wire:click="increaseQuantity({{ $productId }})"><i
                                                    class="dec qtybutton">-</i></button>
                                        </div>
                                        <button wire:click="decreaseQuantity({{ $productId }})"><i
                                                class="inc qtybutton">+</i></button>
                                    </div>
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

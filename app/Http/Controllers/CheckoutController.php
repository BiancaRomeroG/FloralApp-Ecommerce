<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function showCheckout()
    {
        // Obtener el carrito actual de la sesión
        $cart = session()->get('cart', []);

        $subtotal = 0;
        // return $cart;
        foreach ($cart as $productId => $item) {
            $subtotal += $item['quantity'] * $item['price'];
        }

        $shipping = 15;

        return view('checkout', ['cart' => $cart, 'subtotal' => $subtotal, 'shipping' => $shipping]);
    }
}

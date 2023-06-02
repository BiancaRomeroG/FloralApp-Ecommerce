<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        $productId = $request->input('productId');
        $quantity = $request->input('quantity', 1);

        $apiUrl = config('apiUrl');
        $response = Http::get($apiUrl . 'products/' . $productId);
        $product = $response['data'];

        if (!$product) {
            return redirect()->back()->with('error', 'Producto no encontrado');
        }

        // Obtener el carrito actual de la sesión o crear uno vacío si no existe
        $cart = session()->get('cart', []);

        // Verificar si el producto ya está en el carrito
        if (isset($cart[$productId])) {
            // Incrementar la cantidad si el producto ya está en el carrito
            $cart[$productId]['quantity'] += $quantity;
        } else {
            // Agregar el producto al carrito con la cantidad indicada
            $cart[$productId] = [
                'name' => $product['name'],
                'photo' => $product['photo'],
                'price' => $product['price'],
                'quantity' => $quantity,
            ];
        }

        // Actualizar el carrito en la sesión
        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Producto agregado al carrito');
    }


    public function showCart()
    {
        // Obtener el carrito actual de la sesión
        $cart = session()->get('cart', []);

        $subtotal = 0;
        // return $cart;
        foreach ($cart as $productId => $item) {
            $subtotal += $item['quantity'] * $item['price'];
        }

        $shipping = 15;

        return view('cart', ['cart' => $cart, 'subtotal' => $subtotal, 'shipping' => $shipping]);
    }

    public function remove($productId)
    {
        // Obtener el carrito actual de la sesión
        $cart = session()->get('cart', []);

        // Verificar si el producto existe en el carrito
        if (isset($cart[$productId])) {
            // Eliminar el producto del carrito
            unset($cart[$productId]);

            // Actualizar el carrito en la sesión
            session()->put('cart', $cart);

            // Redirigir de vuelta al carrito
            return redirect()->route('cart.show');
        }
    }
}

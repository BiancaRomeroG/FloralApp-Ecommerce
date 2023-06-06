<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;

class CheckoutController extends Controller
{
    public function showCheckout()
    {
        // Obtener el carrito actual de la sesión
        $cart = session()->get('cart', []);

        $subtotal = 0;
        foreach ($cart as $productId => $item) {
            $subtotal += $item['quantity'] * $item['price'];
        }

        $shipping = 15;

        return view('checkout', ['cart' => $cart, 'subtotal' => $subtotal, 'shipping' => $shipping]);
    }

    public function payOrder(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'propietario' => 'required',
            'numero' => 'required',
            'fecha' => 'required|date_format:m/y',
            'cvv' => 'required|digits:3',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Obtener el carrito actual de la sesión
        $cart = session()->get('cart', []);

        $subtotal = 0;
        foreach ($cart as $productId => $item) {
            $subtotal += $item['quantity'] * $item['price'];
        }

        $shipping = 15;
        $total = $subtotal + $shipping;

        $apiUrl = config('apiUrl');
        $response = Http::post($apiUrl . 'payments', [
            'amount' => $total,
            'paymentType' => 1,
            'userId' => session()->get('user_id'),
        ]);

        $paymentId = $response['data']['id'];

        $response = Http::post($apiUrl . 'orders', [
            'customerId' => session()->get('customer_id'),
        ]);

        $order = $response['data'];

        foreach ($cart as $productId => $item) {
            $response = Http::post($apiUrl . 'orderItems', [
                'orderId' => $order['id'],
                'productId' => $productId,
                'quantity' => $item['quantity'],
            ]);
        }

        $response = Http::put($apiUrl . 'orders/' . $order['id'], [
            'id' => $order['id'],
            'status' => 1,
            'customerId' => session('customer_id'),
            'paymentId' => $paymentId,
        ]);

        // Vaciar carrito en la sesión
        session()->forget('cart');

        return redirect()->back()->with('success', 'Pago realizado exitosamente');
    }
}

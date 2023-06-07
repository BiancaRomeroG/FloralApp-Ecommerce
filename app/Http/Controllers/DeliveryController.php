<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DeliveryController extends Controller
{
    public function show($orderId) {
        $apiUrl = config('apiUrl');
        $response = Http::get($apiUrl . 'deliveries/order/' . $orderId);
        $delivery = $response['data'];

        return view('delivery', compact('delivery'));
    }
}

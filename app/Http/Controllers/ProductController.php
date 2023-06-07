<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ProductController extends Controller
{
    public function show($productId)
    {
        $apiUrl = config('apiUrl');
        $response = Http::get($apiUrl . 'products' . '/' . $productId);
        $product = $response['data'];

        return view('product', compact('product'));
    }
}

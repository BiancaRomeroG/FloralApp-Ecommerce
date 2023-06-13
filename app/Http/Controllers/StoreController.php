<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class StoreController extends Controller
{
    public function showStores()
    {
        $apiUrl = config('apiUrl');
        $response = Http::get($apiUrl . 'stores');
        $data = $response['data'];
        return view('stores', compact('data'));
    }

    public function show($id)
    {
        $apiUrl = config('apiUrl');
        $response = Http::get($apiUrl . 'stores/' . $id);
        $store = $response['data'];

        $response = Http::get($apiUrl . 'products/store/' . $store['id']);
        $products = array_slice($response['data'], 0, 4);

        return view('store', compact('store', 'products'));
    }
}

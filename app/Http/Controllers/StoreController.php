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
}

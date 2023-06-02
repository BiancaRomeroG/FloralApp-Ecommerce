<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    public function index()
    {
        $apiUrl = config('apiUrl');
        $response = Http::get($apiUrl . 'products');
        $data = $response['data'];
        return view('home', compact('data'));
    }
}

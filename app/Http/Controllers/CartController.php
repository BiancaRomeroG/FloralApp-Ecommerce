<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CartController extends Controller
{
    public function index()
    {
        $shipping = 15;

        return view('cart', ['shipping' => $shipping]);
    }
}

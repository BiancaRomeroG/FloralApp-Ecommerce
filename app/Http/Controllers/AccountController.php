<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AccountController extends Controller
{
    public function index() {
        $apiUrl = config('apiUrl');
        $customerId = session()->get('customer_id');
        $response = Http::get($apiUrl . 'orders/customer/' . $customerId);
        $orders = $response['data'];

        $userId = session()->get('user_id');
        $response = Http::get($apiUrl . 'userlocations/user/' . $userId);
        $location = $response['data'][0];

        $response = Http::get($apiUrl . 'customers/user/' . $userId);
        $customer = $response['data'];

        return view('account', compact('orders', 'location', 'customer'));
    }
}

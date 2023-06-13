<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CatalogController extends Controller
{
    public function show($id)
    {
        $apiUrl = config('apiUrl');
        $response = Http::get($apiUrl . 'catalogs/' . $id);
        $catalog = $response['data'];

        return view('catalog', compact('catalog'));
    }
}

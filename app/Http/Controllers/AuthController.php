<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $apiUrl = config('apiUrl');
        $response = Http::post($apiUrl . 'auth/login', [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ]);

        if (!$response['success']) {
            return redirect()->back()->withErrors('Credenciales inválidas')->withInput();
        }

        if ($response['data']['role'] != 1) {
            return redirect()->back()->withErrors('Rol no valido')->withInput();
        }

        $user = $response['data'];
        $customer = Http::get($apiUrl . 'customers/user/' . $user['id'])['data'];

        session([
            'user_id' => $user['id'],
            'role' => $user['role'],
            'customer_id' => $customer['id'],
        ]);

        return redirect()->route('home');
    }

    public function showRegister()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'lastName' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'phoneNumber' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $apiUrl = config('apiUrl');
        $response = Http::post($apiUrl . 'customers', [
            'name' => $request->input('name'),
            'lastName' => $request->input('lastName'),
            'email' => $request->input('email'),
            'password' => $request->input('password'),
            "dateOfBirth" => "2023-06-02T08:28:15.044Z",
            'phoneNumber' => $request->input('phoneNumber'),
        ]);

        if (!$response['success']) {
            return redirect()->back()->withErrors('Error en el registrarse')->withInput();
        }

        return redirect()->route('login')->with('success', 'Registro exitoso. Inicia sesión');
    }

    public function logout()
    {
        session()->flush();
        return redirect()->route('login');
    }
}
<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class HomeController extends Controller
{
    public function index(){
        return view('frontend/home');
    }
    public function product()
    {
        return view('frontend/products');
    }
    public function productDetails()
    {
        return view('frontend/product-details');
    }
    public function checkout(){
        return view('frontend/checkout');
    }
    public function cart(){
        return view('frontend/cart');
    }
    public function login(){
        return view('frontend/login');
    }
    public function loginSuccess()
    {
        return view('frontend/loginSuccess');
    }
    public function loginSubmit(Request $request)
    {
        $credentials = [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ];

        if (Auth::attempt($credentials, $request->remember)) {
            return redirect()->route('login.success');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }
    public function registerSubmit(Request $request)
    {
        $name = $request->input('name');
        $email = $request->input('email');
        $password = $request->input('password');

        User::create([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password),
        ]);

        return redirect()->route('product.login')->with('success', 'Registration successful! Please login.');
    }
}

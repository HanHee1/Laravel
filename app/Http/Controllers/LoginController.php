<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.login');
    }

    public function login(Request $request)
    {
        $validation = $request->validate([
            'userid' => 'required',
            'password' => 'required',
        ]);

        $remember = $request->input('remember');

        if (Auth::attempt($validation, $remember)) {
            return redirect()->route('products.index');
        } else {
            return redirect()->back();
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('products.index');
    }
}

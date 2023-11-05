<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Http\Requests\StoreRegisterRequest;


class RegisterController extends Controller
{
    private $user;

    public function __construct(user $user)
    {
        $this->user = $user;
    }

    public function index()
    {
        return view('register.register');
    }

    public function store(StoreRegisterRequest $request)
    {
        $validated = $request->validated();
        $this->user->create($validated);
        return redirect()->route('products.index');
    }
}

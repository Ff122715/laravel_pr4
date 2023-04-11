<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function create()
    {
        return view('users.reg');
    }

    public function store(RegisterRequest $request)
    {
        $user = User::create(array_merge(
            ['password' => Hash::make($request->password)],
            $request->only(['name', 'email'])
        ));

        auth()->login($user);

        return to_route('users.profile');
    }

    public function login()
    {
        return view('users.login');
    }

    public function loginCheck(Request $request)
    {
        if (Auth::attempt($request->only(['email', 'password']))) {
            $request->session()->regenerate();
            return to_route('users.profile');
        }
        return back()->withErrors(['errorLogin' => 'Пользователь не найден']);
    }

    public function logout(Request $request)
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return to_route('products.index');
    }

    public function show()
    {
        return view('users.profile', ['orders' => Order::latest()->where('user_id', auth()->id())->get()]);
    }
}

<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }

    public function register(RegisterRequest $request): RedirectResponse
    {
        if ($request->bot_check != '') {
            return redirect('https://m.vk.ru/kikidyulovme?z=photo704323622_457243385%2Falbum704323622');
        }
        $user = User::create([
            'login'=> $request->login,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        Auth::login($user);
        $request->session()->regenerate();

        return redirect()->route('user.profile', ['user'=>Auth::user()]);
    }
}

<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(LoginRequest $request): RedirectResponse
    {
        $data = $request->only("email", "password");
        if (Auth::attempt($data)) {
            $request->session()->regenerate();
            return redirect('/');
        }
        return redirect()->back()->withInput($request->only('email'))
            ->withErrors(['error' => 'Неправильная почта или пароль']);
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerate();
        return redirect('/auth/login');
    }

    public function index(): View
    {
        return view('auth.login');
    }
}

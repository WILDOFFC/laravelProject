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
        $creditionals = $request->only("email","password");

        // if (!$user || !Hash::check($request->password, $user->password)) {
        //     return redirect()->back()->with('error', 'Неправильная почта или пароль');
        // }

        if (!Auth::attempt($creditionals, $request->boolean('remember'))) {
            return redirect()->back()->withInput($request->only('email'))
            ->withErrors('error', 'Неправильная почта или пароль');
        }
        $request->session()->regenerate();
        return redirect('/products');
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

<?php

namespace App\Http\Controllers;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class UserController extends Controller
{
    public function index(): View
    {
        $user = auth()->user();

        return view("user.profile", ["user" => $user]);
    }

    public function changePassword(): View
    {
        return view('user.changePassword');
    }

    public function passwordUpdate(Request $request): RedirectResponse
    {
        $request->validate([
            'current_password' => ['required', 'string'],
            'new_password'     => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = Auth::user();

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Неправильный текущий пароль']);
        }

        $user->password = Hash::make($request->new_password);

        $user->save();

        return redirect()->route('products.index')->with('success', 'Пароль успешно изменен!');
    }
}

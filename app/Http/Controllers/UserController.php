<?php

namespace App\Http\Controllers;
use App\Models\Review;
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

        $userReviews = $user->review()->where('moderate', 1)->get();

        return view("user.profile", ["user" => $user, "reviews"=>$userReviews]);
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

        return back()->with('success', 'Пароль успешно изменен!');
    }
}

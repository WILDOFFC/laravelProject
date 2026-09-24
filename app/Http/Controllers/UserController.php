<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

    public function passwordUpdate(Request $request, User $user): RedirectResponse
    {

        $user->update([
            'password'=>$request->newPassword,
        ]);

        return redirect()->route('products.index');
    }
}

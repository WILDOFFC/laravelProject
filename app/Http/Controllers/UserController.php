<?php

namespace App\Http\Controllers;
use Illuminate\View\View;

class UserController extends Controller
{
    public function index(): View
    {
        $user = auth()->user();

        return view("user.profile", ["user" => $user]);
    }
}

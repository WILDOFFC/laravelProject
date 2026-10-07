<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AdminController extends Controller
{
    public function cabinet()
    {
        if (Auth::user()->is_admin == 1) {
            $user = auth()->user();
            return view('admin.panel', ['user'=>$user]);
        } else {
            return redirect()->route('user.profile');
        }
    }
}

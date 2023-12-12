<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function show()
    {
        if (Auth::user()) {
            $user = Auth::user();
            return view('profile.profile', compact('user'));
        } else {
            return view('home');
        }
    }
}

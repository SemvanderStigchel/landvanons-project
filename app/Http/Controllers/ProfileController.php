<?php

namespace App\Http\Controllers;

use App\Models\User;
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
            return view('profile.no-profile');
        }
    }

    public function updateCredentials(Request $request)
    {
        $user = Auth::user();
        if ($user->email === $request->input('email')) {
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|string|max:255',
                'phone' => 'required|string'
            ]);
        } else {
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|string|max:255|unique:users',
                'phone' => 'required|string'
            ]);
        }

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');

        $user->save();

        return redirect(route('profile'));
    }
}

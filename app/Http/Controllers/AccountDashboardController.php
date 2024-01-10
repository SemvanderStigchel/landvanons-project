<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountDashboardController extends Controller
{

    function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    function index()
    {
        $users = User::all();
        return view('admin-dashboard.accounts-dashboard', compact('users'));
    }

    function search(Request $request)
    {
        $request->validate([
            'search' => 'max:150'
        ]);

        $users = User::where('name', 'LIKE', '%' . $request->input('search') . '%')
            ->orWhere('email', 'LIKE', '%' . $request->input('search') . '%')->get();
        return view('admin-dashboard.accounts-dashboard', compact('users'));
    }

    function makeAdmin(User $user)
    {
        $user->role = 2;
        $user->save();
        return redirect(route('account-dashboard'));
    }

    function makeNormalUser(User $user)
    {
        $user->role = 1;
        $user->save();
        return redirect(route('account-dashboard'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use Auth;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index ()
    {
        if (Auth::guest()){
            return view('dashboard.no-login');
        } else {
            $user = User::find(Auth::user()->id);
            return view('dashboard.dashboard', compact('user'));
        }
    }
}

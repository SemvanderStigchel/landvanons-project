<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DecorationsController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $costArray = [0, 2, 4];
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $points = Auth::user()->points;
        return view('decorations')->with('points', $points);
    }



    public function purchase(Request $request)
    {
        $user = User::find(Auth::user()->id);
        $cost = [5, 10, 15];
        $request->validate([
            'item' => 'required|numeric'
        ]);

        if($user->points >= $cost[$request->item]) {
            $user->points -=$cost[$request->item];
            $item = $request->item;
            $user->save();
            return view('decorations', compact('item'))->with('points', $user->points,);
        }
        else{
            return view('decorations')->with('points', $user->points);
        }
    }
}

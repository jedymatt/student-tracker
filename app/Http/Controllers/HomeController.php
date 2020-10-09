<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        if ($user->user_type == 0) 
        {
            return view('home', compact('user'));
        } else {
            return redirect()->route('staffHome');
        }
    }

    public function update(Request $request)
    {
        $user = User::find($request->id);
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->email = $request->email;
        $user->course_id = $request->course_id;

        $user->save();

        return back()->withSuccess("Information updated successfully.");
    }
}

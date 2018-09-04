<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;

class UsersController extends Controller
{
    public function __construct() {
        $this->middleware('guest', ['except' => 'logout']);
    }

    public function loginShow() {
        return view('users.login');
    }

    public function loginAction(Request $request) {
        //dd($request);

        if(auth()->once(request(['email', 'password']))) {
            auth()->attempt(request(['email', 'password']));
            return redirect()->route('home');
        } else {
            return back()->withErrors([
                'message' => 'Bad credentials'
            ]);
        }

        return view('users.log');
    }

    public function logout() {
        auth()->logout();

        return redirect()->route('login');
    }
}

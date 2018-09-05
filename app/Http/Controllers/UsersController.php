<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;


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

    public function registerShow() {

        $json = Storage::disk('local')->get('countries.json');
        $countries = json_decode($json, true);
        
        $countryValidateArray = [];
        foreach($countries as $country) {
            $countryValidateArray[] = $country['name'];
        }
        
        //dd($countryValidateArray);

        return view('users.register', compact('countries'));
    }

    public function registerAction(Request $request) {

        $json = Storage::disk('local')->get('countries.json');
        $countries = json_decode($json, true);
        
        $countryValidateArray = [];
        foreach($countries as $country) {
            $countryValidateArray[] = $country['name'];
        }

        $request->validate([
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:6',
            'first_name' => 'required',
            'last_name' => 'required',
            'company' => 'required',
            'country' => 'required|in:'.implode(',', $countryValidateArray)
        ]);

        $user = new User();
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->company = $request->company;
        $user->country = $request->country;

        $user->save();

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->route('home');
        }
    }

    public function logout() {
        auth()->logout();

        return redirect()->route('login');
    }
}

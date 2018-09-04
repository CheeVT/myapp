<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use App\Person\Person;
//use App\Facades\Person;

class HomeController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        //$test = Person::getName();
        //dd($test);

        return view('home.index');
    }
}

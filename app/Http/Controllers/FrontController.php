<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $title="Home";
        return view('home',compact('title'));
    }

    public function contact()
    {
        $title="Contact Us";
        return view('contact-us',compact('title'));
    }
}

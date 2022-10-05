<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PropertiesController extends Controller
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
        return view('home');
    }

    public function buy()
    {
        $title="Property Buy";
        return view('properties-list',compact('title'));
    }

    public function sell()
    {
        $title="Property Sell";
        return view('properties-list',compact('title'));
    }

    public function rent()
    {   
        $title="Property Sell";
        return view('properties-list',compact('title'));
    }
    public function propertiesDetails($id='')
    {
        $title="Property Details";
        return view('properties-details',compact('title'));
    }
}

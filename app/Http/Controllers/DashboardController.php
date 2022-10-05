<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $admin_dashboard="Dashboard";
        return view('admin/dashboard',compact('admin_dashboard'));
    }
}

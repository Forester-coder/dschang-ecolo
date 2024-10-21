<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminDashbord extends Controller
{

    public function __construct()
    {
        $this->middleware('api');
    }

    public function index()
    {
        return view('admin.dashbord');
    }
}
